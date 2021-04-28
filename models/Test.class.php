<?php

$req="select E.id as eleve , S.id_sport as sport from eleve inner join pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport group by E.id having count(*) >1";


$req= "select E.id as eleve , S.id_sport as sport from eleve inner join pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport group by E.id having count(*) >1";


$req =("select E.id, S.id_sport from eleve E inner join pratique P on E.id = P.id_eleve inner join sport S P.id_sport = S.id_sport where S.id_sport = group by S.id_sport");

$req=("select E.id,count( S.id_sport) from ecole T inner join  eleve E on  T.id = E.ecole_id  inner join pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport where  T.id = $id_ecole group by S.id_sport");
