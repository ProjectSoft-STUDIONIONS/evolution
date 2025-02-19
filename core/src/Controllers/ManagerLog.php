<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Legacy\LogHandler;
use EvolutionCMS\Models\ManagerLog as ManagerLogModel;
use EvolutionCMS\Support\DataGrid;
use Illuminate\Support\Facades\Config;

class ManagerLog extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.managerlog';

    private int $amount = 0;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return match ($this->getIndex()) {
            13 => evo()->hasPermission('logs'),
            55 => evo()->hasPermission('settings'),
            default => false,
        };
    }

    /**
     * {@inheritdoc}
     */
    public function process(): bool
    {
        switch ($this->getIndex()) {
            // list
            case 13:
                $this->parameters = [
                    'form' => $this->getFormElements(),
                    'result' => $this->getItems(),
                ];
                break;
            // truncate
            case 55:
                ManagerLogModel::query()->truncate();
                header('Location: index.php?a=13');
                exit();
        }

        return true;
    }

    protected function getFormElements(): array
    {
        $logs = ManagerLogModel::query()
            ->select('internalKey', 'username', 'action', 'itemid', 'itemname')
            ->distinct()
            ->get()
            ->toArray();

        // get all users currently in the log
        $l_users = record_sort(array_unique_multi($logs, 'internalKey'), 'username');
        foreach ($l_users as &$row) {
            $row['active'] = $row['internalKey'] == get_by_key($_REQUEST, 'searchuser');
        }

        // get all available actions in the log
        $l_actions = record_sort(array_unique_multi($logs, 'action'), 'action');
        foreach ($l_actions as &$row) {
            $name = LogHandler::getAction($row['action']);
            if ($name == 'Idle') {
                continue;
            }

            $row['active'] = $row['action'] == get_by_key($_REQUEST, 'action');
            $row['actionname'] = $name;
        }
        $l_actions = record_sort($l_actions, 'actionname');

        // get all itemid currently in log
        $l_items = record_sort(array_unique_multi($logs, 'itemid'), 'itemid');
        foreach ($l_items as $id => &$row) {
            if ($row['itemid'] == '' || $row['itemid'] == '-') {
                unset($l_items[$id]);
                continue;
            }
            $row['active'] =
                isset($_REQUEST['itemid']) && $row['itemid'] == get_by_key($_REQUEST, 'itemid');
        }

        // get all itemname currently in log
        $l_names = record_sort(array_unique_multi($logs, 'itemname'), 'itemname');
        foreach ($l_names as &$row) {
            $row['active'] = $row['itemname'] == get_by_key($_REQUEST, 'itemname');
        }

        $this->amount =
            get_by_key($_REQUEST, 'amount') != '' ? (int) $_REQUEST['amount'] : Config::get('global.number_of_logs');

        return [
            'users' => $l_users,
            'actions' => $l_actions,
            'items' => $l_items,
            'names' => $l_names,
            'message' => get_by_key($_REQUEST, 'message'),
            'datefrom' => $_REQUEST['datefrom'] ?? '',
            'dateto' => $_REQUEST['dateto'] ?? '',
            'amount' => $this->amount,
        ];
    }

    protected function getItems(): string
    {
        $items = ManagerLogModel::query()
            ->orderBy('timestamp', 'DESC')
            ->orderBy('id', 'DESC');

        if ((int) get_by_key($_REQUEST, 'searchuser')) {
            $items = $items->where('internalKey', (int) get_by_key($_REQUEST, 'searchuser'));
        }
        if ((int) get_by_key($_REQUEST, 'action')) {
            $items = $items->where('action', (int) get_by_key($_REQUEST, 'action'));
        }
        if ((int) get_by_key($_REQUEST, 'itemid') != 0) {
            $items = $items->where('itemid', get_by_key($_REQUEST, 'itemid'));
        }
        if (get_by_key($_REQUEST, 'itemname') != 0) {
            $items = $items->where('itemname', get_by_key($_REQUEST, 'itemname'));
        }
        if (get_by_key($_REQUEST, 'message') != '') {
            $items = $items->where('message', 'LIKE', '%' . get_by_key($_REQUEST, 'message') . '%');
        }
        // date stuff
        if (get_by_key($_REQUEST, 'datefrom') != '') {
            $items = $items->where('timestamp', '>', evo()->toTimeStamp($_REQUEST['datefrom']));
        }
        if (get_by_key($_REQUEST, 'dateto') != '') {
            $items = $items->where('timestamp', '<', evo()->toTimeStamp($_REQUEST['dateto']));
        }

        // set page size to 0 t show all items
        $grd = new DataGrid('', $items, $this->amount);

        $grd->pagerClass = '';
        $grd->pagerStyle = 'white-space: normal;';
        $grd->pageClass = 'page-item';
        $grd->selPageClass = 'page-item active';

        $grd->noRecordMsg = __('global.no_records_found');
        $grd->cssClass = 'table data nowrap';
        $grd->columnHeaderClass = 'tableHeader';
        $grd->itemClass = 'tableItem overflow-hidden';
        $grd->altItemClass = 'tableAltItem';
        $grd->fields = 'username,action,itemid,itemname,timestamp,ip,useragent';

        $columns = [
            [ // username
              'width' => '1%',
              'align' => 'center',
              'type' => 'template:<a href="index.php?a=13&searchuser=[+internalKey+]">[+e.value+]</a>',
            ],
            [ // action
              'width' => '',
              'align' => 'center',
              'type' => 'template:<a href="index.php?a=13&action=[+e.value+]">[+message+]</a>',
            ],
            [ // itemid
              'width' => '1%',
              'align' => 'center',
              'type' => '',
            ],
            [ // itemname
              'width' => '',
              'align' => '',
              'type' => '',
            ],
            [ // time
              'width' => '1%',
              'align' => '',
              'type' => 'date:' . evo()->toDateFormat(null, 'formatOnly') . ' H:i:s',
            ],
            [ // ip
              'width' => '1%',
              'align' => '',
              'type' => '',
            ],
            [ // user agent
              'width' => '10%',
              'align' => '',
              'type' => '',
            ],
        ];

        $grd->columns = implode(',', [
            __('global.mgrlog_username'),
            __('global.mgrlog_action'),
            __('global.mgrlog_itemid'),
            __('global.mgrlog_itemname'),
            __('global.mgrlog_time'),
            'IP',
            'USER_AGENT',
        ]);
        $grd->colWidths = implode(',', array_column($columns, 'width'));
        $grd->colAligns = implode(',', array_column($columns, 'align'));
        $grd->colTypes = implode(',', array_column($columns, 'type'));

        return $grd->render();
    }
}
