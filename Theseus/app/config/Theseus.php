<?php

namespace config;

class Theseus {
    const DBDSN = 'mysql:host=localhost;dbname=theseus';
    const DBUSER = 'root';
    const DBMDP = '';
    const NBPERPAGEPRODUCT = 9;
    const NBPERPAGEEVENT = 12;
    const NBPERPAGEFEATURED = 9;
    const CLOSEINSCRIPTION = 172800;
    const KEYHASH = "fg,dhfjkgsd456ùm(*^(;";

    Public function encryptionPWD($pwd) {
        return hash('sha512',$pwd.KEYHASH);
    }
}

