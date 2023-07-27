<div class="row justify-content-center">
    <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação do Bolsista
    </h4>
</div>
<hr class="mt-3 mb-3">
<div class="basic-form">
    <div class="row">
        <input type="text" class="form-control"
               hidden name="pibic_tipo" value="{{ $pibics->tipo }}">
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Nome completo do(a) bolsista</label>
            <input type="text" class="form-control @if ($errors->first('nome_bolsista')) is-invalid @endif"
                   placeholder="Nome Bolsista" name="nome_bolsista" value="{{ old('nome_bolsista') }}">
            {!! $errors->default->first('nome_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">E-mail do(a) bolsista</label>
            <input type="text" class="form-control @if ($errors->first('email_bolsista')) is-invalid @endif"
                   placeholder="E-mail" name="email_bolsista" value="{{ old('email_bolsista') }}">
            {!! $errors->default->first('email_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">CPF do(a) bolsista</label>
            <input type="text" class="form-control @if ($errors->first('cpf_bolsista')) is-invalid @endif"
                   placeholder="CPF" name="cpf_bolsista" value="{{ old('cpf_bolsista') }}" autocomplete="cpf"
                   autofocus id="cpf_bolsista">
            {!! $errors->default->first('cpf_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4 col-sm-4">
            <label class="form-label fw-normal">Documento CPF do(a) bolsista</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-white">Upload</span>
                <div class="form-file">
                    <input type="file"
                           class="form-file-input form-control @if ($errors->first('documento_cpf')) is-invalid @endif"
                           name="documento_cpf">
                </div>
            </div>
            {!! $errors->default->first('documento_cpf', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Numero de Identidade do(a) bolsista</label>
            <input type="text" class="form-control @if ($errors->first('numero_identidade')) is-invalid @endif"
                   placeholder="Identidade" name="numero_identidade" value="{{ old('numero_identidade') }}">
            {!! $errors->default->first('numero_identidade', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4 col-sm-4">
            <label class="form-label fw-normal">Documento de Identidade do(a) bolsista</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-white">Upload</span>
                <div class="form-file">
                    <input type="file"
                           class="form-file-input form-control @if ($errors->first('documento_identidade')) is-invalid @endif"
                           name="documento_identidade">
                </div>
            </div>
            {!! $errors->default->first('documento_identidade', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Telefone do(a) bolsista</label>
            <input type="text" class="form-control @if ($errors->first('telefone_bolsista')) is-invalid @endif"
                   placeholder="(99) 99999-9999" name="telefone_bolsista" value="{{ old('telefone_bolsista') }}"
                   autocomplete="phone" id="telefone_bolsista">
            {!! $errors->default->first('telefone_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Cep do(a) bolsista</label>
            <div class="input-group">
                <input type="text" name="endereco_bolsista[cep]" id="cep"
                       class="form-control @error('endereco_bolsista.cep') is-invalid @enderror" placeholder="00000-000"
                       value="{{ old('endereco_bolsista.cep') }}" pattern="/^[0-9]{5}\-[0-9]{3}$/">
                {{-- <div class="input-group-text"> --}}
                <button type="button" class="input-group-text" onclick="pesquisacep(cep.value)">
                    <span class="flaticon-381-search-1"></span>

                </button>
            </div>
            {!! $errors->default->first(
                'endereco_bolsista.cep',
                '<span style="color:red" class="form-text">:message</span>',
            ) !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Endereço do(a) bolsista</label>
            <div class="input-group">
                <input type="text" name="endereco_bolsista[endereco]" id="endereco"
                       class="form-control @error('endereco_bolsista.endereco') is-invalid @enderror"
                       placeholder="Endereço" autocomplete="endereco"
                       value="{{ old('endereco_bolsista.endereco') }}">
            </div>
            {!! $errors->default->first(
                'endereco_bolsista.endereco',
                '<span style="color:red" class="form-text">:message</span>',
            ) !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Número do(a) bolsista</label>
            <div class="input-group">
                <input type="text" name="endereco_bolsista[numero]"
                       class="form-control @error('endereco_bolsista.numero') is-invalid @enderror" placeholder="Ex 01"
                       value="{{ old('endereco_bolsista.numero') }}">
            </div>
            {!! $errors->default->first(
                'endereco_bolsista.numero',
                '<span style="color:red" class="form-text">:message</span>',
            ) !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="mb-1" for="endereco_bolsista[bairro]">Bairro do(a) bolsista</label>
            <div class="input-group">
                <input type="text" name="endereco_bolsista[bairro]" id="bairro"
                       class="form-control @error('endereco_bolsista.bairro') is-invalid @enderror" placeholder="Bairro"
                       autocomplete="bairro" value="{{ old('endereco_bolsista.bairro') }}">
            </div>
            {!! $errors->default->first('endereco_bolsista.bairro', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label fw-normal @error('centro_bolsista') is-invalid @enderror">Centro do(a) bolsista</label>
            <select
                class="default-select form-control form-custom wide @if ($errors->first('centro_bolsista')) is-invalid @endif"
                name="centro_bolsista"
            >
                <option value="{{ null }}" selected hidden>
                    Selecione
                    uma opção
                </option>
                @foreach ($centros as $centro)
                    <option value={{ $centro->id }}>
                        {{ $centro->centros }}</option>
                @endforeach
            </select>
            {!! $errors->default->first('centro_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label fw-normal">Curso do(a) bolsista</label>
            <select class="form-control form-select" name="curso_bolsista" id="curso_id">
            </select>
            {!! $errors->default->first('curso_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>

    </div>
</div>
<div class="row justify-content-center">
    <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação do Orientador
    </h4>
</div>
<hr class="mt-3 mb-3">
<div class="basic-form">
    <div class="row mt-3">
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Nome Completo do Orientador(a)</label>
            <input type="text"
                   class="form-control form-control-sm @if ($errors->first('nome_orientador')) is-invalid @endif"
                   placeholder="Nome Completo" name="nome_orientador" value="{{ old('nome_orientador') }}">
            {!! $errors->default->first('nome_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">CPF do Orientador(a)</label>
            <input type="text" class="form-control @if ($errors->first('cpf_orientador')) is-invalid @endif"
                   placeholder="CPF Orientador" name="cpf_orientador" value="{{ old('cpf_orientador') }}"
                   autocomplete="cpf" autofocus id="cpf_orientador">
            {!! $errors->default->first('cpf_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Telefone do Orientador(a)</label>
            <input type="text"
                   class="form-control form-control-sm @if ($errors->first('telefone_orientador')) is-invalid @endif"
                   name="telefone_orientador" value="{{ old('telefone_orientador') }}" id="telefone_orientador"
                   placeholder="(99) 99999-9999">
            {!! $errors->default->first('telefone_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">E-mail do Orientador(a)</label>
            <input type="text" class="form-control @if ($errors->first('email_orientador')) is-invalid @endif"
                   placeholder="E-mail" name="email_orientador" value="{{ old('email_orientador') }}">
            {!! $errors->default->first('email_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Campus/Centros do Orientador(a)</label>
            <select
                class="default-select form-control form-custom wide @if ($errors->first('centro_orientador')) is-invalid @endif"
                name="centro_orientador">
                <option value="{{ null }}" selected hidden>Selecione...
                </option>
                @foreach ($centros as $dados)
                    <option value="{{ $dados->id }}">{{ $dados->centros }}
                    </option>
                @endforeach
            </select>
            {!! $errors->default->first('centro_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Título do Projeto do Orientador(a)</label>
            <input type="text"
                   class="form-control form-control-sm @if ($errors->first('tituloprojeto_orientador')) is-invalid @endif"
                   placeholder="Título do Projeto do Orientador(a)" name="tituloprojeto_orientador"
                   value="{{ old('tituloprojeto_orientador') }}">
            {!! $errors->default->first(
                'tituloprojeto_orientador',
                '<span style="color:red" class="form-text">:message</span>',
            ) !!}
        </div>
        <div class="mb-3 col-md-4">
            <label class="form-label fw-normal">Título do Plano de Trabalho do(a) Bolsista</label>
            <input type="text"
                   class="form-control form-control-sm @if ($errors->first('tituloplano_bolsista')) is-invalid @endif"
                   placeholder="Título do Plano de Trabalho Bolsista" name="tituloplano_bolsista"
                   value="{{ old('tituloplano_bolsista') }}">
            {!! $errors->default->first(
                'tituloplano_bolsista',
                '<span style="color:red" class="form-text">:message</span>',
            ) !!}
        </div>
        @if ($pibics->tipo == 'Cnpq')
            <div class="mb-3 col-md-6">
                <label class="form-label fw-normal">Link do Currículo Lattes do Orientador(a)</label>
                <input type="text"
                       class="form-control form-control-sm @if ($errors->first('curriculolattes_orientador')) is-invalid @endif"
                       placeholder="Título do Plano de Trabalho Bolsista" name="curriculolattes_orientador"
                       value="{{ old('curriculolattes_orientador') }}">
                {!! $errors->default->first(
                    'curriculolattes_orientador',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
        @endif


        @if ($pibics->tipo == 'Cnpq' || $pibics->tipo == 'Ações Afirmativas')
            <div class="mb-3 col-md-4">
                <label class="form-label fw-normal">3 Palavras chave</label>
                <input type="text"
                       class="form-control form-control-sm @if ($errors->first('palavras_chave')) is-invalid @endif"
                       placeholder="3 palavras chave" name="palavras_chave"
                       value="{{ old('palavras_chave') }}">
                {!! $errors->default->first(
                    'palavras_chave',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
        @endif
    </div>
</div>
<div class="row justify-content-center">
    <h4 class=" text-muted d-inline text-center px-4 pb-2">Dados Acadêmicos do Bolsista
    </h4>
</div>
<hr class="mt-3 mb-3">
<div class="basic-form">
    <div class="row mt-2">
        <div class="mb-3 col-md-6 col-sm-6">
            <label class="form-label fw-normal">Histórico Escolar atualizado,
                disponível do
                SIGUEMA (formato PDF)</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-white">Upload</span>
                <div class="form-file">
                    <input type="file"
                           class="form-file-input form-control @if ($errors->first('historico_escolar')) is-invalid @endif"
                           name="historico_escolar">
                </div>
            </div>
            {!! $errors->default->first('historico_escolar', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-6 col-sm-6">
            <label class="form-label fw-normal">Declaração de vínculo do aluno à UEMA
                atualizado (formato PDF)</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-white">Upload</span>
                <div class="form-file">
                    <input type="file"
                           class="form-file-input form-control @if ($errors->first('declaracao_vinculo')) is-invalid @endif"
                           name="declaracao_vinculo">
                </div>
            </div>
            {!! $errors->default->first('declaracao_vinculo', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>
        <div class="mb-3 col-md-6 col-sm-6">
            <label class="form-label fw-normal">Termo de Compromisso do(a) bolsista @if($pibics->tipo == 'Fapema')
                    modelo UEMA
                @endif
                               (formato
                               PDF)</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-white">Upload</span>
                <div class="form-file">
                    <input type="file"
                           class="form-file-input form-control @if ($errors->first('termocompromisso_bolsista')) is-invalid @endif"
                           name="termocompromisso_bolsista">
                </div>
            </div>
            {!! $errors->default->first(
                'termocompromisso_bolsista',
                '<span style="color:red" class="form-text">:message</span>',
            ) !!}
        </div>

        @if ($pibics->tipo == 'Fapema')
            <div class="mb-3 col-md-6 col-sm-6">
                <label class="form-label fw-normal">Termo de Compromisso do(a) bolsista modelo Fapema
                    (formato
                    PDF)</label>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary text-white">Upload</span>
                    <div class="form-file">
                        <input type="file"
                               class="form-file-input form-control @if ($errors->first('termocompromissobolsista_fapema')) is-invalid @endif"
                               name="termocompromissobolsista_fapema">
                    </div>
                </div>
                {!! $errors->default->first(
                    'termocompromissobolsista_fapema',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
        @endif
        @if($pibics->tipo !== 'Pivic')
            <div class="mb-3 col-md-6 col-sm-6">
                <label class="form-label fw-normal">Declaração Negativa de Vínculo
                    Empregatício @if($pibics->tipo == 'Fapema')
                        modelo UEMA
                    @endif
                                   (formato PDF)</label>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary text-white">Upload</span>
                    <div class="form-file">
                        <input type="file"
                               class="form-file-input form-control @if ($errors->first('declaracaonegativa_vinculo')) is-invalid @endif"
                               name="declaracaonegativa_vinculo">
                    </div>
                </div>
                {!! $errors->default->first(
                    'declaracaonegativa_vinculo',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
        @endif


        @if ($pibics->tipo == 'Fapema')
            <div class="mb-3 col-md-6 col-sm-6">
                <label class="form-label fw-normal">Declaração Negativa de Vínculo
                    Empregatício modelo Fapema
                    (formato PDF)</label>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary text-white">Upload</span>
                    <div class="form-file">
                        <input type="file"
                               class="form-file-input form-control @if ($errors->first('declaracaoempregaticio_fapema')) is-invalid @endif"
                               name="declaracaoempregaticio_fapema">
                    </div>
                </div>
                {!! $errors->default->first(
                    'declaracaoempregaticio_fapema',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
        @endif
        <div class="mb-3 col-md-6 col-sm-6">
            <label class="form-label fw-normal">Currículo atualizado, gerado na
                Plataforma
                Lattes (formato PDF)</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-white">Upload</span>
                <div class="form-file">
                    <input type="file"
                           class="form-file-input form-control @if ($errors->first('curriculo_lattes')) is-invalid @endif"
                           name="curriculo_lattes">
                </div>
            </div>
            {!! $errors->default->first('curriculo_lattes', '<span style="color:red" class="form-text">:message</span>') !!}
        </div>


        @if($pibics->tipo !== 'Pivic')
            <div class="mb-3 col-md-6 col-sm-6">
                <label class="form-label fw-normal">Declaração conjuta de estágio (quando
                    for o
                    caso) (formato PDF)</label>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary text-white">Upload</span>
                    <div class="form-file">
                        <input type="file"
                               class="form-file-input form-control @if ($errors->first('declaracao_estagio')) is-invalid @endif"
                               name="declaracao_estagio">
                    </div>
                </div>
                {!! $errors->default->first(
                    'declaracao_estagio',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
        @endif
        @if ($pibics->tipo == 'Ações Afirmativas')
            <div class="mb-3 col-md-6 col-sm-6">
                <label class="form-label fw-normal">Documento comprobatório de ingresso UEMA por meio de ações
                    afirmativas (formato PDF)</label>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary text-white">Upload</span>
                    <div class="form-file">
                        <input type="file"
                               class="form-file-input form-control @if ($errors->first('doc_comprobatorio')) is-invalid @endif"
                               name="doc_comprobatorio">
                    </div>
                </div>
                {!! $errors->default->first(
                    'doc_comprobatorio',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
        @endif
    </div>
</div>

@if($pibics->tipo !== 'Pivic')
    <div class="row justify-content-center">
        <h4 class=" text-muted d-inline text-center px-4 pb-2">Informações Bancárias do Bolsista
        </h4>
    </div>
    <hr class="mt-3 mb-3">
    <div class="basic-form">
        <div class="row mt-3">
            <div class="mb-3 col-md-6">
                <label class="form-label fw-normal">Agência do Banco do Brasil n°</label>
                <input type="text"
                       class="form-control form-control-sm @if ($errors->first('agencia_banco')) is-invalid @endif"
                       placeholder="Agência do Banco" name="agencia_banco" value="{{ old('agencia_banco') }}">
                {!! $errors->default->first('agencia_banco', '<span style="color:red" class="form-text">:message</span>') !!}
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label fw-normal">Número da Conta Corrente do Banco do
                    Brasil</label>
                <input type="text"
                       class="form-control form-control-sm @if ($errors->first('numero_conta_corrente')) is-invalid @endif"
                       placeholder="Número da Conta" name="numero_conta_corrente"
                       value="{{ old('numero_conta_corrente') }}">
                {!! $errors->default->first(
                    'numero_conta_corrente',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
            <div class="mb-3 col-md-6 col-sm-6">
                <label class="form-label fw-normal">Comprovante de Conta Corrente do Banco
                    do
                    Brasil (formato PDF)</label>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary text-white">Upload</span>
                    <div class="form-file">
                        <input type="file"
                               class="form-file-input form-control @if ($errors->first('comprovante_conta_corrente')) is-invalid @endif"
                               name="comprovante_conta_corrente">
                    </div>
                </div>
                {!! $errors->default->first(
                    'comprovante_conta_corrente',
                    '<span style="color:red" class="form-text">:message</span>',
                ) !!}
            </div>
        </div>
    </div>
@endif


<div class="row justify-content-center">
    <h4 class=" text-muted d-inline text-center px-4 pb-2">Documentação do
        Orientador(a)
    </h4>
</div>
<hr class="mt-3 mb-3">
<div class="basic-form">
    <div class="row mt-3">
        <div class="mb-3 col-md-6 col-sm-6">
            <label class="form-label fw-normal">Termo de Compromisso (formato
                PDF)</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-white">Upload</span>
                <div class="form-file">
                    <input type="file"
                           class="form-file-input form-control @if ($errors->first('termocompromisso_orientador')) is-invalid @endif"
                           name="termocompromisso_orientador">
                </div>
            </div>
            {!! $errors->default->first(
                'termocompromisso_orientador',
                '<span style="color:red" class="form-text">:message</span>',
            ) !!}
        </div>
    </div>
</div>
