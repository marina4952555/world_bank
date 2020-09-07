<?php
  $result = $_POST['date'];
  $startDay = substr($_POST['date'], 0, 2);
  $startMonth = substr($_POST['date'], 3, 2);
  $startYear = substr($_POST['date'], 7, 4);
  $period;
  $percent = 0.1;
  $replenishmentSumm = $_POST["summrep"];

  switch ($_POST["term"]) {
    case 1:
      $period = 11;
      break;
    case 2:
      $period = 23;
      break;
    case 3:
      $period = 35;
      break;
    case 4:
      $period = 47;
      break;
    case 5:
      $period = 59;
      break;
  }

  function getDays($year) {
    $numOfDays = 0;
    $totalMonth = 12;

    for($m=1; $m<=$totalMonth; $m++){
        $numOfDays += cal_days_in_month(CAL_GREGORIAN, $m, $year);
    }

    return $numOfDays;
  }

  $daysInYear = getDays($startYear);
  $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $startMonth, $startYear) - intval($startDay, 10);
  $resultSumm = round($_POST["summ"] + $_POST["summ"]*$daysInMonth*($percent/$daysInYear));

  for ($i = 1; $i <= $period; $i++) {
    $startMonth += 1;

    if ($startMonth > 12) {
      $startMonth = 1;
      $startYear += 1;
      $daysInYear = getDays($startYear);
    }

    if ($i === $period) {
      $daysInMonth = $startDay;
    }

    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $startMonth, $startYear);

    if ($_POST["replenishment"] == 'true') {
      $resultSumm = round($resultSumm + $replenishmentSumm + ($resultSumm + $replenishmentSumm)*$daysInMonth*($percent/$daysInYear));
    } else {
      $resultSumm = round($resultSumm + $resultSumm*$daysInMonth*($percent/$daysInYear));
    }
  }
 
  echo json_encode($resultSumm); 
?>