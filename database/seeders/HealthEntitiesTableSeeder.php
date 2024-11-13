<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HealthEntitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('health_entities')->delete();
        
        \DB::table('health_entities')->insert(array (
            0 => 
            array (
                'id' => 1,

                'name' => 'COOSALUD EPS',
            ),
            1 => 
            array (
                'id' => 2,

                'name' => 'NUEVA EPS',
            ),
            2 => 
            array (
                'id' => 3,

                'name' => 'MUTUAL SER',
            ),
            3 => 
            array (
                'id' => 4,

                'name' => 'ALIANSALUD EPS',
            ),
            4 => 
            array (
                'id' => 5,

                'name' => 'SALUD TOTAL EPS SA.',
            ),
            5 => 
            array (
                'id' => 6,

                'name' => 'EPS SANITAS',
            ),
            6 => 
            array (
                'id' => 7,

                'name' => 'EPS SURA',
            ),
            7 => 
            array (
                'id' => 8,

                'name' => 'FAMISANAR',
            ),
            8 => 
            array (
                'id' => 9,

                'name' => 'SERVICIO CCCIDENTAL DE SALUD EPS SOS',
            ),
            9 => 
            array (
                'id' => 10,

                'name' => 'SALUD MIA',
            ),
            10 => 
            array (
                'id' => 11,

                'name' => 'COMFENALCO VALLE',
            ),
            11 => 
            array (
                'id' => 12,

                'name' => 'COMPENSAR EPS',
            ),
            12 => 
            array (
                'id' => 13,

                'name' => 'EPM • EMPRESAS PUBLICAS DE MEDELLA',
            ),
            13 => 
            array (
                'id' => 14,

                'name' => 'FONCO DE PASMO SCCIAL DE FERROCARRILES NACIONALES DE COLOMBIA',
            ),
            14 => 
            array (
                'id' => 15,

                'name' => 'CAJACOPI ATLANTICO',
            ),
            15 => 
            array (
                'id' => 16,

                'name' => 'CAPRESOCA',
            ),
            16 => 
            array (
                'id' => 17,

                'name' => 'COMFACHOCO',
            ),
            17 => 
            array (
                'id' => 18,

                'name' => 'COMFACRIENTE',
            ),
            18 => 
            array (
                'id' => 19,

                'name' => 'EPS FAMILIAR DE COLOMBA',
            ),
            19 => 
            array (
                'id' => 20,

                'name' => 'ASUET SALUD',
            ),
            20 => 
            array (
                'id' => 21,

                'name' => 'Eccopsos ESS EPSS',
            ),
            21 => 
            array (
                'id' => 22,

                'name' => 'EMSSANAR E.S.S',
            ),
            22 => 
            array (
                'id' => 23,

                'name' => 'CAPITAL SALUD EPS-S',
            ),
            23 => 
            array (
                'id' => 24,

                'name' => 'SAVIA SALUD EPS',
            ),
            24 => 
            array (
                'id' => 25,

                'name' => 'DUSAKAWI EPSI',
            ),
            25 => 
            array (
                'id' => 26,

                'name' => 'ASOCIACON INDIGENA DEL CAUCA EPSI',
            ),
            26 => 
            array (
                'id' => 27,

                'name' => 'ANAS WAYUU EPSI',
            ),
            27 => 
            array (
                'id' => 28,

                'name' => 'MALLAMAS EPSI',
            ),
            28 => 
            array (
                'id' => 29,

                'name' => 'SALUD BOLIVAR EPS SAS',
            ),
            29 => 
            array (
                'id' => 30,

                'name' => 'PIJAOS SALUD EPSI',
            ),
        ));
        
        
    }
}