<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            'ver-camarista',
            'crear-camarista',
            'editar-camarista',
            'borrar-camarista',

            'ver-CadenaHotelera',
            'crear-CadenaHotelera',
            'editar-CadenaHotelera',
            'borrar-CadenaHotelera',

            'ver-hoteles',
            'crear-hoteles',
            'editar-hoteles',
            'borrar-hoteles',

            'camarista',
            'supervisor',
            'gerente',
            'corporativo',

            'opcion_dash',
            'opcion_user',
            'opcion_rol',
            'opcion_chotel',
            'opcion_camar',
            'opcion_cuest',

            'por_hotel',
            'todos_hoteles',


            /* 'ver-cuestionario',
            'crear-cuestionario',
            'editar-cuestionario',
            'borrar-cuestionario',
 */
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
