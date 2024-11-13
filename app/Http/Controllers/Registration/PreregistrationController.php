<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Models\Preregistration;
use App\Models\Program;
use Illuminate\Http\Request;
use Toastr;

class PreregistrationController extends Controller
{
    public function __construct()
    {
        $this->title = trans_choice('module_preregistration', 1);
        $this->route = 'registration.preregistration';
        $this->view = 'registration.preregistration';
        $this->path = 'preregistration';
        $this->access = 'preregistration';

    }


    public function index()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        $data['program']= Program::get();
        
        return view($this->view.'.index', $data);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        
        // Field Validation
        $request->validate([
            'fecha_de_inters' => 'required',
            'primer_nombre' => 'required|min:6',
            'segundo_nombre' => 'required|min:6',
            'primer_apellido' => 'required|min:6',
            'segundo_apellido' => 'required|min:6',
            'tipos_de_documento' => 'required',
            'numero_de_documento' => 'required|numeric',
            'fecha_de_expedicion' => 'required',
            'ciudad_de_expedicion' => 'required',
            'departamento' => 'required',
            'tipo_de_inscripcin'=>'required',
            'numero_celular_de_contacto' => 'required',
            'correo_electrnico' => 'required',
            'programa_acadmico' => 'required',
            'que_le_motivo_a_estudiar_este_programa_acadmico'=> 'required', 
        ]);

        $exist = Preregistration::where('numero_de_documento',$request->numero_de_documento)->where('programa_acadmico',$request->programa_acadmico)->first();
        if($exist){
            Toastr::error(__('Ya existe estudiante'), __('msg_error'));
            return redirect()->route($this->route.'.index');
        }

        // Insert Data
        $pre = new Preregistration();
        $pre->fecha_de_inters = $request->fecha_de_inters;
        $pre->primer_nombre = $request->primer_nombre;
        $pre->segundo_nombre = $request->segundo_nombre;
        $pre->primer_apellido = $request->primer_apellido;
        $pre->segundo_apellido = $request->segundo_apellido;
        $pre->tipos_de_documento = $request->tipos_de_documento;
        $pre->numero_de_documento = $request->numero_de_documento;
        $pre->fecha_de_expedicion = $request->fecha_de_expedicion;
        $pre->ciudad_de_expedicion = $request->ciudad_de_expedicion;
        $pre->departamento = $request->departamento;
        $pre->tipo_de_inscripcin = $request->tipo_de_inscripcin;
        $pre->numero_celular_de_contacto = $request->numero_celular_de_contacto;

        $pre->correo_electrnico = $request->correo_electrnico;
        $pre->programa_acadmico = $request->programa_acadmico;
        $pre->status = 1;
        $pre->que_le_motivo_a_estudiar_este_programa_acadmico = $request->que_le_motivo_a_estudiar_este_programa_acadmico;
        $pre->save();

        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
    
    }

    public function destroy($id)
    {
        
    }
}
