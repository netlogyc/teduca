<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\Preregistration;
use Illuminate\Http\Request;
use Toastr;

class InterviewController extends Controller
{
    public function __construct()
    {
        $this->title = trans_choice('module_interview', 1);
        $this->route = 'registration.interview';
        $this->view = 'registration.interview';
        $this->path = 'interview';
        $this->access = 'interview';

    }


    public function index($id)
    {
        
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['candidate']= Preregistration::where('numero_de_documento',$id)->where('status',4)->first();
        

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
            'metas_profesionales_mediano_plazo'=> 'required',
            'metas_profesionales_largo_plazo'=> 'required',
            'metas_personales_mediano_plazo'=> 'required',
            'metas_personales_largo_plazo'=> 'required',
            'cuales_son_sus_fortalezas'=> 'required',
            'cuales_son_sus_debilidades'=> 'required',
            'como_convertiria_debilidades_en_fortalezas'=> 'required',
            'hace_cuando_termino_educacion_media'=> 'required',
            'cuales_materias_se_dificultaban'=> 'required',
            'cuales_materias_le_agradaban'=> 'required',
            'que_le_gusta_en_tiempo_libre'=> 'required',
            'que_le_motivo_elegir'=> 'required',
            'cual_es_el_campo_accion'=> 'required',
            'que_perspectiva_profesional_tiene'=> 'required',
            'cual_seria_su_aporte'=> 'required',
            'que_otras_instituciones_educativas'=> 'required',
            'conoce_el_valor_de_carrera'=> 'required',
            'cuales_opciones_de_grado'=> 'required',
            'por_que_quiere_estudiar_ctb'=> 'required',
            'cuales_son_sus_expectativas'=> 'required',
            'porque_deberiamos_aceptarlo'=> 'required',
            'como_contribuiria_al_crecimiento'=> 'required'
        ]);

        
        $candidate = Preregistration::find($request->id);
        $interview = new Interview();
        $interview->metas_profesionales_mediano_plazo = $request->metas_profesionales_mediano_plazo;
        $interview->metas_profesionales_largo_plazo= $request->metas_profesionales_largo_plazo;
        $interview->metas_personales_mediano_plazo= $request->metas_personales_mediano_plazo;
        $interview->metas_personales_largo_plazo= $request->metas_personales_largo_plazo;
        $interview->cuales_son_sus_fortalezas= $request->cuales_son_sus_fortalezas;
        $interview->cuales_son_sus_debilidades= $request->cuales_son_sus_debilidades;
        $interview->como_convertiria_debilidades_en_fortalezas= $request->como_convertiria_debilidades_en_fortalezas;
        $interview->hace_cuando_termino_educacion_media= $request->hace_cuando_termino_educacion_media;
        $interview->cuales_materias_se_dificultaban= $request->cuales_materias_se_dificultaban;
        $interview->cuales_materias_le_agradaban= $request->cuales_materias_le_agradaban;
        $interview->que_le_gusta_en_tiempo_libre= $request->que_le_gusta_en_tiempo_libre;
        $interview->que_le_motivo_elegir= $request->que_le_motivo_elegir;
        $interview->cual_es_el_campo_accion= $request->cual_es_el_campo_accion;
        $interview->que_perspectiva_profesional_tiene= $request->que_perspectiva_profesional_tiene;
        $interview->cual_seria_su_aporte= $request->cual_seria_su_aporte;
        $interview->que_otras_instituciones_educativas= $request->que_otras_instituciones_educativas;
        $interview->conoce_el_valor_de_carrera= $request->conoce_el_valor_de_carrera;
        $interview->cuales_opciones_de_grado= $request->cuales_opciones_de_grado;
        $interview->por_que_quiere_estudiar_ctb= $request->por_que_quiere_estudiar_ctbs;
        $interview->cuales_son_sus_expectativas= $request->cuales_son_sus_expectativas;
        $interview->porque_deberiamos_aceptarlo= $request->porque_deberiamos_aceptarlo;
        $interview->como_contribuiria_al_crecimiento= $request->como_contribuiria_al_crecimiento;
        $interview->preregistration_id= $request->id;
        $interview->resultado= $request->resultado;
        $interview->save();
        

        if ($request->resultado=='Rechazado') {
            $candidate->status = 7;
        }else{
            $candidate->status = 5;
        }
        $candidate->save();


        Toastr::success(__('Entrevista registrada exitosamente'), __('msg_success'));

        return redirect()->route('student.login');
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
