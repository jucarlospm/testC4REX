<?php

namespace App\Http\Controllers;

class GuestsController extends Controller
{
    protected $guests;

    public function __construct()
    {
        $file_path = realpath( __DIR__ . '/../../../database/seeds/guests.json');
        $this->guests = json_decode(file_get_contents($file_path), true);
    }


    public function showDjsGuests($dj = null)
    {
        $guestController =  new GuestsController();
        $djs= $guestController->groupBy("guest_of");

        $djsGuests = array();
        if($dj == null){
            foreach ($djs as $count => $djName) {
                $djsGuests[$count]['name'] = $djName;
                $countGuest = 0;
                foreach ($this->guests as $guest) {
                    if($guest['guest_of'] == $djName){
                        $countGuest++;
                    }
                }
                $djsGuests[$count]['guests'] = $countGuest;
            }
        }else{
            $djsGuests['name'] = $dj;
            $countGuest = 0;
            foreach ($this->guests as $guest) {
                if($guest['guest_of'] == $dj){
                    $countGuest++;
                }
            }
            $djsGuests['guests'] = $countGuest;
        }

        return $djsGuests;
    }

    public function showMostLikedDj(){
        $guestController =  new GuestsController();
        $djs = $guestController->groupBy("favourite_dj");

        $likedDjs = array();
        foreach ($djs as $count => $djName) {
            $likedDjs[$count]['name'] = $djName;
            $countLikes = 0;
            foreach ($this->guests as $dj) {
                if($dj['favourite_dj'] == $djName){
                    $countLikes++;
                }
            }
            $likedDjs[$count]['likes'] = $countLikes;
        }

        return $likedDjs;
    }

    public function showGuestPickedUp(){
        $guestController =  new GuestsController();
        $locations = $guestController->groupBy("location");

        $guestsLocation = array();
        foreach ($locations as $count => $location) {
            $guestsLocation[$count]['location'] = $location;
            $countGuests = 0;
            foreach ($this->guests as $dj) {
                if($dj['location'] == $location){
                    $countGuests++;
                }
            }
            $guestsLocation[$count]['guests'] = $countGuests;
        }

        return $guestsLocation;

    }

    public function groupBy($value){
        $array = array();

        foreach ($this->guests as $key) {
            if(!in_array($key[$value],$array,true)){
                $array[] = $key[$value];
            }
        }

        return $array;
    }
}
