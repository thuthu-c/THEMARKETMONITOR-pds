@extends('layouts.main')

@section('title', 'Funcionarios HOME')

@section('content')


@if(session('msg'))
    <p>
    <h2>{{session('msg')}}</h2>
    </p>
@endif


<div class = "content">
    <h1>Lista de funcionários:</h1>

    @foreach($funcionarios as $funcionario)
        <p>Nome: {{$funcionario->nome}}</p>
        <p>Data de nascimento: {{$funcionario->dataDeNascimento}}</p>
        <p>Email: {{$funcionario->email}}</p>
        <p>Telefone: {{$funcionario->telefone}}</p>
        <p>CPF: {{$funcionario->cpf}}</p>

        <a href="{{route('funcionario.verMetas', ['funcionario' => $funcionario->id])}}">Ver metas do funcionário</a>

        <a href="{{route('funcionario.edit', ['funcionario' => $funcionario->id])}}">Editar funcionário</a>

        <form action="{{route('funcionario.destroy', ['funcionario' => $funcionario->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$funcionario->id}}">
            <input type="submit" value="Deletar funcionário">
        </form>

        <br>
    @endforeach

    <br>
    <a href="{{route('funcionario.create')}}">Criar funcionário</a>
</div>

@endsection

