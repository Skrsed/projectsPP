<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class APIsController extends Controller
{
    public function numToWord($number)
    {
        $response = digit_text($number, 'ru');
        return response()->json(['data' => $response], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function quadratics()
    {
        $a = Input::get('a');
        $b = Input::get('b');
        $c = Input::get('c');
        if ($a == 0) 
            $response = "Не квадратное уравнение";
        else {
            $d = $b * $b - 4 * $a * $c;
            if ($d < 0) 
                $response = "Корней нет";
            else {
                $d = sqrt($d);
                $response['x1'] = ((-$b) + $d) / (2 * $a);
                $response['x2'] = ((-$b) - $d) / (2 * $a);
            }
        }
    return response()->json(['data' => $response], 200, [], JSON_UNESCAPED_UNICODE);
  }
  public function weekdays()
  {
    $days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда','Четверг', 'Пятница', 'Суббота'];
    $strdate = strtotime(Input::get('date'));
    $response = $strdate ? $days[date("w",$strdate)] : "Неверный формат даты";       
    return response()->json(['data' => $response], 200, [], JSON_UNESCAPED_UNICODE);
  }
  public function fibonaccis($n){
    $F = [];
    $F[0] = 0; $F[1] = 1;
    if($this->isInteger($n)){
        $this->fib($n,$F);
        $res = $F[$n];
    } 
    else {
        $res = "Не число";
    }
    return response()->json(['data' => $res], 200, [], JSON_UNESCAPED_UNICODE);
  }
  private function isInteger($input){
    return(ctype_digit(strval($input)));
  }
  private function fib($n,&$F)
  {
    if($n>1) 
        $F[$n] = $this->fib($n - 1,$F) + $this->fib($n - 2,$F); 
    return $F[$n];      
  }
  public function regions($code){
    if(is_int((int)$code) && array_key_exists($code,self::REGIONS)) {
        $region = self::REGIONS[$code];
        
    } 
    else {
        $region = "Не найдено региона с таким кодом";
    }
      
    return response()->json(['data' => $region], 200, [], JSON_UNESCAPED_UNICODE);
  }

  private const REGIONS = [
        1 => 'Республика Адыгея',
        2 => 'Республика Башкортостан',
        3 => 'Республика Бурятия',
        4 => 'Республика Алтай',
        5 => 'Республика Дагестан',
        6 => 'Республика Ингушетия',
        7 => 'Кабардино-Балкарская Республика',
        8 => 'Республика Калмыкия',
        9 => 'Карачаево-Черкесская Республика',
        10 => 'Республика Карелия',
        11 => 'Республика Коми',
        12 => 'Республика Марий Эл',
        13 => 'Республика Мордовия',
        14 => 'Республика Саха (Якутия)',
        15 => 'Республика Северная Осетия - Алания',
        16 => 'Республика Татарстан',
        17 => 'Республика Тыва',
        18 => 'Удмуртская Республика',
        19 => 'Республика Хакасия',
        20 => 'Чеченская республика',
        21 => 'Чувашская Республика',
        22 => 'Алтайский край',
        23 => 'Краснодарский край',
        24 => 'Красноярский край',
        25 => 'Приморский край',
        26 => 'Ставропольский край',
        27 => 'Хабаровский край',
        28 => 'Амурская область',
        29 => 'Архангельская область',
        30 => 'Астраханская область',
        31 => 'Белгородская область',
        32 => 'Брянская область',
        33 => 'Владимирская область',
        34 => 'Волгоградская область',
        35 => 'Вологодская область',
        36 => 'Воронежская область',
        37 => 'Ивановская область',
        38 => 'Иркутская область',
        39 => 'Калининградская область',
        40 => 'Калужская область',
        41 => 'Камчатский край',
        42 => 'Кемеровская область',
        43 => 'Кировская область',
        44 => 'Костромская область',
        45 => 'Курганская область',
        46 => 'Курская область',
        47 => 'Ленинградская область',
        48 => 'Липецкая область',
        49 => 'Магаданская область',
        50 => 'Московская область',
        51 => 'Мурманская область',
        52 => 'Нижегородская область',
        53 => 'Новгородская область',
        54 => 'Новосибирская область',
        55 => 'Омская область',
        56 => 'Оренбургская область',
        57 => 'Орловская область',
        58 => 'Пензенская область',
        59 => 'Пермский край',
        60 => 'Псковская область',
        61 => 'Ростовская область',
        62 => 'Рязанская область',
        63 => 'Самарская область',
        64 => 'Саратовская область',
        65 => 'Сахалинская область',
        66 => 'Свердловская область',
        67 => 'Смоленская область',
        68 => 'Тамбовская область',
        69 => 'Тверская область',
        70 => 'Томская область',
        71 => 'Тульская область',
        72 => 'Тюменская область',
        73 => 'Ульяновская область',
        74 => 'Челябинская область',
        75 => 'Забайкальский край',
        76 => 'Ярославская область',
        77 => 'Москва',
        78 => 'Санкт-Петербург',
        79 => 'Еврейская автономная область',
        80 => 'Забайкальский край',
        81 => 'Пермский край',
        82 => 'Республика Крым',
        83 => 'Ненецкий автономный округ',
        84 => 'Красноярский край',
        85 => 'Иркутская область',
        86 => 'Ханты-Мансийский АО',
        87 => 'Чукотский автономный округ',
        88 => 'Красноярский край',
        89 => 'Ямало-Ненецкий автономный округ',
        90 => 'Московская область',
        91 => 'Калининградская область',
        92 => 'Севастополь',
        93 => 'Краснодарский край',
        94 => 'Байконур',
        95 => 'Чеченская республика',
        96 => 'Свердловская область',
        97 => 'Москва',
        98 => 'Санкт-Петербург',
        99 => 'Москва',
        101 => 'Республика Адыгея',
        102 => 'Республика Башкортостан',
        103 => 'Республика Бурятия',
        109 => 'Карачаево-Черкесская Республика',
        111 => 'Республика Коми',
        113 => 'Республика Мордовия',
        116 => 'Республика Татарстан',
        118 => 'Удмуртская Республика',
        121 => 'Чувашская Республика',
        123 => 'Краснодарский край',
        124 => 'Красноярский край',
        125 => 'Приморский край',
        126 => 'Ставропольский край',
        134 => 'Волгоградская область',
        136 => 'Воронежская область',
        138 => 'Иркутская область',
        142 => 'Кемеровская область',
        150 => 'Московская область ',
        152 => 'Нижегородская область',
        154 => 'Новосибирская область',
        159 => 'Пермский край',
        161 => 'Ростовская область',
        163 => 'Самарская область',
        164 => 'Саратовская область',
        173 => 'Ульяновская область',
        174 => 'Челябинская область',
        176 => 'Ярославская область',
        177 => 'Москва',
        178 => 'Санкт-Петербург',
        186 => 'Ханты-Мансийский АО',
        190 => 'Московская область',
        196 => 'Свердловская область',
        197 => 'Москва',
        199 => 'Москва',
        716 => 'Республика Татарстан',
        750 => 'Московская область',
        763 => 'Самарская область',
        777 => 'Москва',
        799 => 'Москва'  
  ];

}
