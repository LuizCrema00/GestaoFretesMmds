<?php

namespace App\Http\Controllers;

use App\Models\Caminhao;
use App\Models\Cliente;
use App\Models\Despesa;
use App\Models\Despesasfixa;
use App\Models\Estado;
use App\Models\Frete;
use App\Models\Motorista;
use App\Models\Cidade;
use App\Models\Tipodespesa;
use App\Rules\Cpf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Response;


class FreteController extends Controller
{

    public function index(){
        return view ('GestaoFrete.index');
    }

    public function index1(Request $request)
    {
        $search = request('search');

        if($search){
            $motoristas = Motorista::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $motoristas = motorista::query()->orderBy('nome')->get();
        }


        return view('GestaoFrete.listar-motoristas', ['motoristas'=>$motoristas, 'search'=> $search]);
    }


    public function create(){
        return view ('GestaoFrete.create');
    }


    public function store(Request $request){
        $this->validate($request, [
            'nome' => 'required|unique:motoristas',
            'Fone' => 'required|min:10',
            'CPF_CNPJ' => 'required|cpf_cnpj|unique:motoristas', new Cpf,
            'CNH'=> 'required|cnh|unique:motoristas',
            'Validade_CNH' => 'required|after_or_equal:today',
            'Tipo_Contrato' => 'required',
        ],[
                'nome.required' => 'Nome é obrigatorio',
                'nome.unique' =>  'Nome do Motorista ja cadastrado',
                'Fone.required' => 'Fone é obrigatorio',
                'CPF_CNPJ.required' => 'CPF/CNPJ é obrigatorio',
                'CPF_CNPJ.unique' =>  'CPF/CNPJ ja cadastrado',
                'CNH.required'=> 'CNH é obrigatória',
                'CNH.unique'=> 'CNH já cadastrada',
                'Validade_CNH.required' => 'Validade da CNH é obrigatoria',
                'Tipo_Contrato.required' => 'O Tipo de contrato é obrigatorio',
            ]
        );
        Motorista::create($request->all());
        session()->flash('message', 'Cadastrado com sucesso !');
        return redirect()->route('motorista-index');
    }

    public function edit($id){
        $motoristas = Motorista::where('id', $id)->first();
        if(!empty($motoristas)){
            return view('GestaoFrete.edit', ['motoristas'=>$motoristas]);
        }
        else{
            return redirect()->route('motorista-index');
        }
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nome' => 'required',
            'Fone' => 'required|min:10',
            'CPF_CNPJ' => 'required|cpf_cnpj',
            'CNH'=> 'required|cnh',
            'Validade_CNH' => 'required|after_or_equal:today',
            'Tipo_Contrato' => 'required',

        ],[
                'nome.required' => 'Nome é obrigatorio',
                'Fone.required' => 'Celular é obrigatorio',
                'CPF_CNPJ.required' => 'CPF é obrigatorio',
                'Validade_CNH.required' => 'Validade da CNH é obrigatoria',
                'Tipo_Contrato.required' => 'O Tipo de contratado é obrigatorio',
                'Validade_CNH.after_or_equal:today' => 'CNH Vencida'
            ]
        );
        $data = [
            'nome' => $request->nome,
            'Fone' => $request->Fone,
            'CPF_CNPJ' => $request->CPF_CNPJ,
            'CNH' => $request->CNH,
            'Validade_CNH' => $request->Validade_CNH,
            'Tipo_Contrato' => $request->Tipo_Contrato,
        ];
        Motorista::where('id', $id)->update($data);
        session()->flash('message', 'Atualizado com sucesso !');
        return redirect()->route('motorista-index');
    }

    public function destroy($id){
        Motorista::where('id', $id)->delete();
        session()->flash('message', 'Excluído com sucesso !');
        return redirect()->route('motorista-index');
    }

    public function index2(Request $request)
    {
        $search = request('search');

        if($search){
            $clientes = Cliente::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $clientes = cliente::query()->orderBy('nome')->get();
        }

        return view('GestaoFrete.listar-clientes', ['clientes'=>$clientes, 'search'=> $search]);
    }

    public function create2(){
        return view ('GestaoFrete.create2');
    }

    public function store2(Request $request){
        $this->validate($request, [
            'nome' => 'required',
            'CNPJ' => 'required|cpf_cnpj',
            'CEP' => 'required',
            'UF' => 'required',
            'Cidade' => 'required',
            'Logradouro' => 'required',
            'Numero' => 'required',
            'Bairro' => 'required',
            'Fone' => 'required|min:10',
        ],[
                'nome.required' => 'Nome é obrigatorio',
                'CNPJ.required' => 'CNPJ é obrigatorio',
                'CEP.required' => 'CEP é obrigatorio',
                'UF.required' => 'UF é obrigatorio',
                'Cidade.required' => 'Cidade é obrigatorio',
                'Logradouro.required' => 'logradouro é obrigatorio',
                'Numero.required' => 'Numero é obrigatorio',
                'Bairro.required' => 'Bairro é obrigatorio',
                'Fone.required' => 'Telefone é obrigatório',
            ]
        );
        Cliente::create($request->all());
        session()->flash('message', 'Cadastrado com sucesso !');
        return redirect()->route('cliente-index');
    }

    public function edit2($id){
        $clientes = Cliente::where('id', $id)->first();
        if(!empty($clientes)){
            return view('GestaoFrete.edit2', ['clientes'=>$clientes]);
        }
        else{
            return redirect()->route('cliente-index');
        }
    }

    public function update2(Request $request, $id){
        $this->validate($request, [
            'nome' => 'required',
            'CNPJ' => 'required|cpf_cnpj',
            'CEP' => 'required',
            'UF' => 'required',
            'Cidade' => 'required',
            'Logradouro' => 'required',
            'Numero' => 'required',
            'Bairro' => 'required',
            'Fone' => 'required|min:10',
        ],[
                'nome.required' => 'Nome é obrigatorio',
                'CNPJ.required' => 'CNPJ é obrigatorio',
                'CEP.required' => 'CEP é obrigatorio',
                'UF.required' => 'UF é obrigatorio',
                'Cidade.required' => 'Cidade é obrigatorio',
                'Logradouro.required' => 'logradouro é obrigatorio',
                'Numero.required' => 'Numero é obrigatorio',
                'Bairro.required' => 'Bairro é obrigatorio',
                'Fone.required' => 'Telefone é obrigatório',
            ]
        );
        $data = [
            'nome' => $request->nome,
            'CNPJ' => $request->CNPJ,
            'CEP' => $request->CEP,
            'UF' => $request->UF,
            'Cidade' => $request->Cidade,
            'Logradouro' => $request->Logradouro,
            'Numero' => $request->Numero,
            'Bairro' => $request->Bairro,
            'Fone' => $request->Fone,
        ];
        Cliente::where('id', $id)->update($data);
        session()->flash('message', 'Atualizado com sucesso !');
        return redirect()->route('cliente-index');
    }

    public function destroy2($id){
        Cliente::where('id', $id)->delete();
        session()->flash('message', 'Excluído com sucesso !');
        return redirect()->route('cliente-index');
    }

    public function index3(){

        $search = request('search');

        if($search){
            $caminhaos = Caminhao::where([
                ['placa', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $caminhaos = caminhao::query()->orderBy('placa')->get();
        }

        return view('GestaoFrete.listar-caminhoes', ['caminhaos'=>$caminhaos, 'search'=> $search]);

    }

    public function create3(){
        return view ('GestaoFrete.create3');
    }

    public function store3(Request $request){
        $this->validate($request, [
            'placa' => 'required|unique:caminhaos',
            'Carga_Max' => 'required',
            'veiculo' => 'required',
        ],[
                'placa.required' => 'Placa é obrigatoria',
                'placa.unique' =>  'Placa do caminhao ja cadastrada',
                'Carga_Max.required' => 'Carga Máxima é obrigatória',
                'veiculo.required' => 'O tipo do veículo é obrigatório',
            ]
        );
        Caminhao::create($request->all());
        session()->flash('message', 'Cadastrado com sucesso !');
        return redirect()->route('caminhao-index');
    }

    public function edit3($id){
        $caminhaos = Caminhao::where('id', $id)->first();
        if(!empty($caminhaos)){
            return view('GestaoFrete.edit3', ['caminhaos'=>$caminhaos]);
        }
        else{
            return redirect()->route('caminhao-index');
        }
    }

    public function update3(Request $request, $id){
        $this->validate($request, [
            'placa' => 'required',
            'Carga_Max' => 'required',
            'veiculo' => 'required',
        ],[
                'placa.required' => 'Placa é obrigatoria',
                'placa.unique' =>  'Placa do caminhao ja cadastrada',
                'Carga_Max.required' => 'Peso é obrigatorio',
                'veiculo.required' => 'O tipo do veiculo é obrigatorio',
            ]
        );
        $data = [
            'placa' => $request->placa,
            'veiculo' => $request->veiculo,
            'Carga_Max' => $request->Carga_Max,
        ];
        Caminhao::where('id', $id)->update($data);
        session()->flash('message', 'Atualizado com sucesso !');
        return redirect()->route('caminhao-index');
    }

    public function destroy3($id){
        Caminhao::where('id', $id)->delete();
        session()->flash('message', 'Excluído com sucesso !');
        return redirect()->route('caminhao-index');
    }

    public function index4(){
        $fretes = Frete::query()->orderBy('id', 'ASC')->get();
        return view('GestaoFrete.listar-fretes', ['fretes'=>$fretes]);

    }

    public function create4(){
        $clientes = Cliente::query()->orderBy('nome', 'ASC')->get();
        $motoristas = Motorista::query()->orderBy('nome', 'ASC')->get();
        return view ('GestaoFrete.create4', compact('clientes', 'motoristas'));
    }

    public function store4(Request $request){
        $this->validate($request, [
            'cliente_id' => 'required',
            'motorista_id' => 'required',
            'DataFrete' => 'required',
            'CTe' => 'required|unique:fretes',
            'ValorNF' => 'required',
            'ValorFrete' => 'nullable',
            'CidadeOrigem' => 'required',
            'UFOrigem' => 'required',
            'CidadeDestino' => 'required',
            'UFDestino' => 'required',
            'DataFim' => 'nullable',
            'CustoOperacao' => 'nullable',
            'caminhao_id' => 'nullable',
        ],[
                'cliente_id.required' => 'Cliente é obrigatório',
                'motorista_id.required' => 'Motorista é obrigatório',
                'DataFrete.required' => 'A Data do Frete é obrigatoria',
                'CTe.required' => 'A CTe é obrigatoria',
                'CTe.unique' => 'CTe ja cadastrada',
                'ValorNF.required' => 'O Valor da Nota Fiscal é obrigatoria',
                'CidadeOrigem.required' => 'A Cidade de Origem é obrigatoria',
                'UFOrigem.required' => 'O UF de Origem é obrigatorio',
                'CidadeDestino.required' => 'A Cidade de Destino é obrigatoria',
                'UFDestino.required' => 'O UF de Destino é obrigatorio',
            ]
        );


        $fretes = Frete::create($request->all());
        session()->flash('message', 'Cadastrado com sucesso !');
        return redirect()->route('frete-index', compact('fretes'));
    }


    public function edit4($id){
        $fretes = Frete::where('id', $id)->first();
        $clientes = Cliente::all();
        $motoristas = Motorista::all();
        return view('GestaoFrete.edit4', ['fretes'=>$fretes, 'clientes'=>$clientes, 'motoristas'=>$motoristas]);
    }

    public function update4(Request $request, $id){
        $this->validate($request, [
                'cliente_id' => 'required',
                'motorista_id' => 'required',
                'DataFrete' => 'required|date',
                'DataFim' => 'required|date|after_or_equal:DataFrete',
                'CTe' => 'required',
                'ValorNF' => 'required',
                'ValorFrete' => 'required',
                'CidadeOrigem' => 'required',
                'UFOrigem' => 'required',
                'CidadeDestino' => 'required',
                'UFDestino' => 'required',
                'CustoOperacao' => 'required',
                'caminhao_id' => 'nullable',
        ],[
                'cliente_id.required' => 'Cliente é obrigatório',
                'motorista_id.required' => 'Motorista é obrigatório',
                'DataFrete.required' => 'A Data do Frete é obrigatoria',
                'CTe.required' => 'A CTe é obrigatoria',
                'CTe.unique' => 'CTe ja cadastrada',
                'ValorNF.required' => 'O Valor da Nota Fiscal é obrigatoria',
                'CidadeOrigem.required' => 'A Cidade de Origem é obrigatoria',
                'UFOrigem.required' => 'O UF de Origem é obrigatorio',
                'CidadeDestino.required' => 'A Cidade de Destino é obrigatoria',
                'UFDestino.required' => 'O UF de Destino é obrigatorio',
                'Motorista.required' => 'O Nome do Motorista é obrigatorio',
            ]
        );

        $fretes = Frete::find($id);
        $fretes->update($request->all());
        session()->flash('message', 'Atualizado com sucesso !');
        return redirect()->route('frete-index');
    }

    public function __construct(Frete $frete){
        $this->frete = $frete;
    }

    public function destroy4($id){
       Frete::where('id', $id)->delete();
        session()->flash('message', 'Excluído com sucesso !');
       return redirect()->route('frete-index');
    }

    public function mostrarDespesa(){

        $fretes = Frete::all();
        $despesas = Despesa::all();
        return view('GestaoFrete.mostrar-despesas', compact('despesas', 'fretes'));
    }

    public function index5(){

        $despesas = Despesa::all();
        return view('GestaoFrete.listar-despesas', ['despesas'=>$despesas]);

    }

    public function create5(){
        $fretes = Frete::query()->orderBy('id', 'ASC')->get();;
        $tipodespesas = Tipodespesa::query()->orderBy('TipoDespesa', 'ASC')->get();
        return view ('GestaoFrete.create5', compact('fretes', 'tipodespesas'));
    }

    public function store5(Request $request){
        $this->validate($request, [
            'frete_id' => 'required',
            'tipodespesa_id' => 'required',
            'Descricao' => 'required',
        ],[
                'frete_id' => 'Campo Obrigatorio',
                'tipodespesa_id' => 'tipo da despesa é obrigatório',
                'Descricao.required' => ' Descrição é obrigatória',
            ]
        );

        $despesas = Despesa::create($request->all());
        session()->flash('message', 'Cadastrado com sucesso !');
        return redirect()->route('despesa-index', compact('despesas'));
    }

    public function edit5($id){
        $despesas = Despesa::where('id', $id)->first();
        $tipodespesas = Tipodespesa::all();
        $fretes = Frete::all();
        if(!empty($despesas)){
            return view('GestaoFrete.edit5', ['despesas'=>$despesas, 'tipodespesas' => $tipodespesas, 'fretes' => $fretes]);
        }
        else{
            return redirect()->route('despesa-index');
        }
    }

    public function update5(Request $request, $id){
        $this->validate($request, [
            'Descricao' => 'required',
        ],[
                'Descricao.required' => 'Campo Descrição é obrigatória',
            ]
        );

        $despesas = Despesa::find($id);
        $despesas->update($request->all());
        session()->flash('message', 'Atualizado com sucesso !');
        return redirect()->route('despesa-index');
    }

    public function destroy5($id){
        Despesa::where('id', $id)->delete();
        session()->flash('message', 'Excluído com sucesso !');
        return redirect()->route('despesa-index');
    }

    public function index6(){

        $search = request('search');

        if($search){
            $despesasfixas = Despesasfixa::where([
                ['Mes', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $despesasfixas = Despesasfixa::query()->orderBy('DataLanc')->get();
        }

        return view('GestaoFrete.listar-despesasfixas', ['despesasfixas'=>$despesasfixas, 'search'=> $search]);

    }

    public function create6(){
        $tipodespesas = Tipodespesa::query()->orderBy('TipoDespesa', 'ASC')->get();
        return view ('GestaoFrete.create6', compact('tipodespesas'));
    }

    public function store6(Request $request){
        $this->validate($request, [
            'tipodespesa_id' => 'required',
            'DataLanc' => 'required|date',
            'Descricao' => 'required',
            'DataVenc' => 'required|date|after_or_equal:DataLanc',
            'Valor' => 'required'
        ],[
                'tipodespesa_id' => 'Tipo da despesa é obrigatório',
                'DataLanc.required' => 'Data de Lançamento é obrigatoria',
                'Descricao.required' => 'A descrição é obrigatoria',
                'DataVenc.required' => 'Data de vencimento é obrigatoria',
                'Valor.required' => 'Valor é obrigatório'
            ]
        );
        Despesasfixa::create($request->all());
        session()->flash('message', 'Cadastrado com sucesso !');
        return redirect()->route('despesasfixas-index');
    }

    public function edit6($id){
        $despesasfixas = Despesasfixa::where('id', $id)->first();
        $tipodespesas = Tipodespesa::all();
        if(!empty($despesasfixas)){
            return view('GestaoFrete.edit6', ['despesasfixas'=>$despesasfixas, 'tipodespesas' => $tipodespesas]);
        }
        else{
            return redirect()->route('despesasfixas-index');
        }
    }

    public function update6(Request $request, $id){
        $this->validate($request, [
            'DataLanc' => 'required|date',
            'Descricao' => 'required',
            'Valor' => 'required',
            'DataVenc' => 'required|date|after_or_equal:DataLanc',
        ],[
                'DataLanc.required' => 'Data de Lançamento é obrigatoria',
                'Descricao.required' => 'A descrição é obrigatoria',
                'Valor.required' => 'O valor é obrigatorio',
                'DataVenc.required' => 'Data de vencimento é obrigatoria',
            ]
        );
        $despesasfixas = Despesasfixa::find($id);
        $despesasfixas->update($request->all());
        session()->flash('message', 'Atualizado com sucesso !');
        return redirect()->route('despesasfixas-index');
    }

    public function destroy6($id){
        Despesasfixa::where('id', $id)->delete();
        session()->flash('message', 'Excluído com sucesso !');
        return redirect()->route('despesasfixas-index');
    }
    //
}
