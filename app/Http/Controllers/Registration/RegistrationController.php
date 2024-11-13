<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Mail\MailEntrevista;
use App\Models\Health_entity;
use App\Models\Icfes;
use App\Models\Preregistration;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Toastr;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->title = trans_choice('module_registration', 1);
        $this->route = 'registration.registration';
        $this->view = 'registration.registration';
        $this->path = 'registration';
        $this->access = 'registration';

    }


    public function index($id)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['eps']= Health_entity::get();
        $data['provinces'] = Province::where('status', '1')->orderBy('title', 'asc')->get();
        $data['candidate']= Preregistration::where('numero_de_documento',$id)->where('status',2)->first();

        if (!$data['candidate']) {
            return redirect()->route('student.login')->with('error', 'Candidato no encontrado.');
        }
        
        return view($this->view.'.index', $data);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'modalidad'=> 'required',
            'metodologia'=> 'required',
            'periodo_academico'=> 'required',
            'horario'=> 'required',
            'genero'=> 'required',
            'fecha_nacimiento'=> 'required',
            'nacionalidad'=> 'required',
            'ciudad_nacimiento'=> 'required',
            'eps'=> 'required',
            'libreta_militar'=> 'nullable|numeric',
            'permanent_address'=> 'required',
            'school_name' => 'required',
            'titulo_obtenido' => 'required',
            'nombre_padre' => 'required',
            'nombre_madre' => 'required',
            'nombre_convive' => 'required',
            'convive_type' => 'required',
            'convive_document'=> 'required',
            'document_convive'=> 'required',
            'tel_convive'=> 'required|max:10|min:7',
            'email_convive'=> 'required',
            'ocupacion_convive'=> 'required',
            'convive_estudio'=> 'required',
            'ciudad_trabajo__convive'=> 'required',
            'sitio_trabajo__convive'=> 'required',
            'telefono_trabajo__convive'=> 'required',
            'direccion_trabajo__convive'=> 'required',
            'cargo_convive'=> 'required',
            'profesion_convive'=> 'required',
            'cash_month'=> 'required',
            'economic'=> 'required',
            'economic_person'=> 'required',
            'personal_economic'=> 'required',
            'blood_group'=> 'required',
            'marital_status'=> 'required',
            'alergias'=> 'required',
            'permanent_province'=> 'required',
            'permanent_district'=> 'required',

            'icfes_snp'=> 'required|min:11|max:11',
            'icfes_date'=> 'required',
            'icfes_type'=> 'required',

            

        ]);


        $ifces = new Icfes();
        $ifces->icfes_snp = $request->icfes_snp;
        $ifces->icfes_date = $request->icfes_date;
        $ifces->icfes_type = $request->icfes_type;
        $ifces->icfes_file = $request->icfes_file;
        
        

        if ($request->icfes_type =='presentado_1999') {
            // if ($request->puntaje_total_1999 == ''  ) {
            //     Toastr::error(__('Existen campos vacios en ICFES'), __('msg_error'));
            //     return back()->withInput();
            // }
            $ifces->icfes_total = $request->puntaje_total_1999;
        }

        if ($request->icfes_type =='presentado_2000_2003') {
            // if ($request->matematicas == '' || $request->ingles == ''|| $request->biologia == '' 
            // || $request->fisica == '' || $request->lenguaje == '' || $request->quimica == ''|| $request->filosofia == '' 
            // || $request->interdiscipinlar == '' || $request->ciencias_sociales == '' ) {
            //     Toastr::error(__('Existen campos vacios en ICFES'), __('msg_error'));
            //     return back()->withInput();
            // }
            $ifces->icfes_total = $request->puntaje_total_2000;
        }
        if ($request->icfes_type =='presentado_2004') {
            // if ( $request->ingles == ''|| $request->biologia == '' 
            // || $request->fisica == '' || $request->lenguaje == '' || $request->filosofia == '' 
            // || $request->interdiscipinlar == '' || $request->ciencias_naturales == '' ) {
            //     Toastr::error(__('Existen campos vacios en ICFES'), __('msg_error'));
            //     return back()->withInput();
            // }
            $ifces->icfes_total = $request->puntaje_total_2004;
        }
        if ($request->icfes_type =='presentado_2005_2013') {
            // if ($request->matematicas == '' || $request->ingles == ''|| $request->biologia == '' 
            // || $request->fisica == '' || $request->lenguaje == '' || $request->quimica == ''|| $request->filosofia == '' 
            // || $request->interdiscipinlar == '' || $request->ciencias_sociales == '' ) {
            //     Toastr::error(__('Existen campos vacios en ICFES'), __('msg_error'));
            //     return back()->withInput();
            // }
            $ifces->icfes_total = $request->puntaje_total_2005;
        }
        if ($request->icfes_type =='presentado_2014_2015') {
            // if ($request->lectura_critica == '' || $request->sociales == ''|| $request->matematicas == '' 
            // || $request->razonamiento_cuantico == '' || $request->ingles == '' || $request->competencias_ciudadanas == ''|| $request->ciencias_naturales == ''  ) {
            //     Toastr::error(__('Existen campos vacios en ICFES'), __('msg_error'));
            //     return back()->withInput();
            // }
            $ifces->icfes_total = $request->puntaje_total_2014;
        }
        if ($request->icfes_type =='presentado_2016_en_adelante') {
            // if ($request->lectura_critica == '' || $request->sociales == ''|| $request->matematicas == '' 
            //  || $request->ingles == '' || $request->ciencias_naturales == ''  ) {
            //     Toastr::error(__('Existen campos vacios en ICFES'), __('msg_error'));
            //     return back()->withInput();
            // }
            $ifces->icfes_total = $request->puntaje_total_2016;
        }
        $ifces->preregistration_id = $request->id;
        $ifces->save();
        
        $aspirante = Preregistration::find($request->id);


        $aspirante->modalidad = $request->modalidad;
        $aspirante->metodologia = $request->metodologia;
        $aspirante->periodo_academico = $request->periodo_academico;
        $aspirante->horario = $request->horario;
        $aspirante->genero = $request->genero;
        $aspirante->fecha_nacimiento = $request->fecha_nacimiento;
        $aspirante->nacionalidad = $request->nacionalidad;
        $aspirante->ciudad_nacimiento = $request->ciudad_nacimiento;
        $aspirante->eps = $request->eps;
        $aspirante->libreta_militar = $request->libreta_militar;
        $aspirante->permanent_address = $request->permanent_address;
        $aspirante->school_name = $request->school_name;
        $aspirante->titulo_obtenido = $request->titulo_obtenido;
        $aspirante->nombre_padre = $request->nombre_padre;
        $aspirante->nombre_madre = $request->nombre_madre;
        $aspirante->nombre_convive = $request->nombre_convive;
        $aspirante->convive_type = $request->convive_type;
        $aspirante->convive_document = $request->convive_document;
        $aspirante->document_convive = $request->document_convive;
        $aspirante->tel_convive = $request->tel_convive;
        $aspirante->email_convive = $request->email_convive;
        $aspirante->ocupacion_convive = $request->ocupacion_convive;
        $aspirante->convive_estudio = $request->convive_estudio;
        $aspirante->ciudad_trabajo__convive = $request->ciudad_trabajo__convive;
        $aspirante->sitio_trabajo__convive = $request->sitio_trabajo__convive;
        $aspirante->telefono_trabajo__convive = $request->telefono_trabajo__convive;
        $aspirante->direccion_trabajo__convive = $request->direccion_trabajo__convive;
        $aspirante->cargo_convive = $request->cargo_convive;
        $aspirante->profesion_convive = $request->profesion_convive;
        $aspirante->cash_month = $request->cash_month;
        $aspirante->economic = $request->economic;
        $aspirante->economic_person = $request->economic_person;
        $aspirante->personal_economic = $request->personal_economic;
        $aspirante->blood_group = $request->blood_group;
        $aspirante->marital_status = $request->marital_status;
        $aspirante->alergias = $request->alergias;
        $aspirante->permanent_province = $request->permanent_province;
        $aspirante->permanent_district = $request->permanent_district;
        $aspirante->status = 3;

        


        $data = ['nombre' => $aspirante->primer_nombre];
        Mail::to($aspirante->correo_electrnico)->send(new MailEntrevista($data));

        $aspirante->save();
       
        
        Toastr::success(__('Registro exitoso, revisa tu correo'), __('msg_success'));

        return redirect()->route('student.login');
    }

    public function totalIcfes(){

    }


}