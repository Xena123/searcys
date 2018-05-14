<?php
  function callFundaApi($cat, $sedol) {
    $url = 'https://www.fundslibrary.co.uk/FundsLibrary.DataApi.WebApi/' . $cat . '?sedol=' . $sedol;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer PS51X1ZUQR4DO5BRK5S2'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    $result = json_decode($response, true);

    return $result;

    curl_close($curl);
  }



  function flFormatDate($field) {
    if ( isset($field) && $field != NULL ) {
      $dateConvert = new DateTime( $field );
      return $dateConvert->format('d/m/Y');
    } else {
      return '';
    }
  }

  function getApiField($field) {
    if ( isset($field) && $field != NULL ) {
      return $field;
    } else {
      return '';
    }
  }

  function getApiLi($title, $field) {
    if ( isset($field) && $field != NULL ) {
      return '<li class="fund__detail"><span class="fund--left">' . $title . '</span><span class="fund--right">' . $field . '</span></li>';
    } else {
      return '';
    }
  }

  function getApiLiNum($title, $field, $dec, $after) {
    if ( isset($field) && $field != NULL ) {
      return '<li class="fund__detail"><span class="fund--left">' . $title . '</span><span class="fund--right">£' . number_format( $field, $dec ) . $after . '</span></li>';
    } else {
      return '';
    }
  }

  function getApiLiDate($title, $field) {
    if ( isset($field) && $field != NULL ) {
      $dateConvert = new DateTime( $field );
      return '<li class="fund__detail"><span class="fund--left">' . $title . '</span><span class="fund--right">' . $dateConvert->format('d/m/Y') . '</span></li>';
    } else {
      return '';
    }
  }

  function getApiLiBool($title, $field) {
    if ( isset($field) && $field != NULL ) {
      if ( $field == true ) {
        $response = 'Yes';
      } else {
        $response = 'No';
      }
      return '<li class="fund__detail"><span class="fund--left">' . $title . '</span><span class="fund--right">' . $response . '</span></li>';
    } else {
      return '';
    }

  }
