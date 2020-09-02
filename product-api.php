<?php require __DIR__ . '/__connect_db.php';
$perPage = 15;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$output = [
    'perPage' => $perPage,
    'page' => $page,
    'totalRows' => 0,
    'totalPages' => 0,
    'rows' => [], // 該頁的資料
    'pageBtns' => [],
];




// 篩選項目
$where = " WHERE 1";
if (!empty($_GET['series'])) {
    $where .= sprintf(" AND `series` IN (%s) ", implode(',', $_GET['series']));
}
if (!empty($_GET['colors'])) {
    $where .= sprintf(" AND `color` IN (%s) ", implode(',', $_GET['colors']));
}
if (!empty($_GET['types'])) {
    $where .= sprintf(" AND `type` IN (%s) ", implode(',', $_GET['types']));
}


switch(empty($_GET['orderBy']) ? '' : $_GET['orderBy']){
    case 'popular':
        $orderBy = ' ORDER BY sid DESC ';
        break;
    case 'lowPrice':
        $orderBy = ' ORDER BY price ASC ';
        break;
    case 'highPrice':
        $orderBy = ' ORDER BY price DESC ';
        break;
    default:
        $orderBy = ' ORDER BY sid ASC ';

}


// 抓到篩選後商品資料
$totalPages = 0;
$t_sql = "SELECT COUNT(1) FROM `product` $where";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];



// 將資料代入判斷頁數


if ($totalRows > 0) {
    $totalPages = ceil($totalRows / $perPage);
    if ($page < 1) $page = 1;
    if ($page > $totalPages) $page = $totalPages;

    $sql = sprintf("SELECT * FROM `product` %s %s LIMIT %s, %s", $where, $orderBy, ($page - 1) * $perPage, $perPage);
    $stmt = $pdo->query($sql);

    if ($totalPages <= 5) {
        for ($i = 1; $i <= $totalPages; $i++) {
            $pageBtns[] = $i;
        }
    } else {
        $tmpAr1 = [];
        for ($i = $page - 2; $i <= $totalPages; $i++) {
            if ($i >= 1) {
                $tmpAr1[] = $i;
            }
            if (count($tmpAr1) >= 5) {
                break;
            }
        }
        $tmpAr2 = [];
        for ($i = $page + 2; $i >= 1; $i--) {
            if ($i <= $totalPages) {
                array_unshift($tmpAr2, $i);
            }
            if (count($tmpAr2) >= 5) { //5為每次顯示的分頁按鈕數量 (前2+自己+後2)
                break;
            }
        }
        $pageBtns = count($tmpAr1) > count($tmpAr2) ? $tmpAr1 : $tmpAr2; //取頁數多的array
    }


    $output['page'] = $page;
    $output['totalRows'] = $totalRows;
    $output['totalPages'] = $totalPages;
    $output['rows'] = $stmt->fetchAll();
    $output['pageBtns'] = $pageBtns;
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
