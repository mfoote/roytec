<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'lcc_contact';
    protected $primaryKey = 'lcc_contact_id';
}

//ALTER TABLE `lcc_contact` CHANGE `lcc_contact_fname` `first_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_lname` `last_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_alias` `alias` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_dob` `date_of_birth` DATE NULL DEFAULT NULL,
//CHANGE `lcc_contact_gender` `gender` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_address` `address` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_address_two` `address_two` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_city` `city` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_state_prov` `state` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_postal` `postal` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_country` `country` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_alt_phone` `alternate_phone` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_phone_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_alt_phone_ext` `alternate_extension` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_prim_phone` `phone` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_prim_phone_ext` `phone_extension` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_email` `email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_source_one` `source_one` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//CHANGE `lcc_contact_source_two` `source_two` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
