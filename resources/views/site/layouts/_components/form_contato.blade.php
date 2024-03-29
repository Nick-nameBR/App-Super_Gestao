{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}">
    {{--MENSAGEM ERROR NOME--}}
    {{$errors->has('nome') ? $errors->first('nome') : ''}}
    <br>
    <input name="telefone" value="{{ old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
    {{--MENSAGEM ERROR TELEFONE--}}
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
    {{--MENSAGEM ERROR EMAIL--}}
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->tipo_contato}}</option>
        @endforeach
    </select>
    {{--MENSAGEM ERROR MOTIVO_CONTATO--}}
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <br>
    <textarea name="mensagem" class="{{ $classe }}">@if(old('mensagem')!= ''){{old('mensagem')}}@else Preencha aqui a sua mensagem @endif</textarea>
    {{--MENSAGEM ERROR MENSAGEM--}}
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" onclick="notificacao()" class="{{ $classe }}">ENVIAR</button>
</form>
