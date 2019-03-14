<?php

class BookingModel {

	public function addBooking($post){

		$today = date("Y-m-d H:i:s");

		$bookdate = $post['year'].'-'.$post['mois'].'-'.$post['jour'];

		$booktime = $post['heure'].':'.$post['minutes'].':00';

		$database = new Database();

		$database->executeSql('INSERT INTO 
								Booking (BookingDate, BookingTime, NumberOfSeats, User_Id, CreationTimestamp) 
							   VALUES 
							   (?, ?, ?, ?, ?)',  

								[ 
									$bookdate, 
									$booktime,
									$post['people'],
									$_SESSION['Id'],
									$today
								]);

		header('Location: ../');
		exit();
	}
}

?>