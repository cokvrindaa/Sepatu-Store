<?php
namespace App\Repositories\Contracts;


// interface digunakan dan dirancang  agar implementsnya itu memiliki method yang harus sama 
interface OrderRepositoryInterface {
  public function createTranscation(array $data);
  public function findByTrxIdAndPhoneNumber ($bookingTrxId, $phoneNumber);
  public function saveToSession(array $data);
  public function updateSessionData(array $data);
  public function getOrderDataFromSession();
}