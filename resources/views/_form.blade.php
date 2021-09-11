                    @csrf
                    
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="nome_completo" class="form-label">Nome Completo</label>
                            <input type="text" value="{{ @$diarista->nome_completo }}" class="form-control" id="nome_completo" name="nome_completo" required maxlength="100">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12 col-md-4">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" value="{{ @$diarista->cpf }}" class="form-control" id="cpf" name="cpf" required maxlength="14" placeholder="123.123.123-12">
                        </div>
                        <div class="mb-3 col-12 col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ @$diarista->email }}" class="form-control" id="email" name="email" required maxlength="100" placeholder="exemplo@email.com.br">
                        </div>
                        <div class="mb-3 col-12 col-md-4">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" value="{{ @$diarista->telefone }}" class="form-control" id="telefone" name="telefone" required maxlength="15" placeholder="(12) 12312-1231">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-9 col-md-5">
                            <label for="logradouro" class="form-label">Logradouro</label>
                            <input type="text" value="{{ @$diarista->logradouro }}" class="form-control" id="logradouro" name="logradouro" required maxlength="255">
                        </div>
                        <div class="mb-3 col-3 col-md-2">
                            <label for="numero" class="form-label">Número</label>
                            <input type="text" value="{{ @$diarista->numero }}" class="form-control" id="numero" name="numero" required maxlength="10" placeholder="123123">
                        </div>
                        <div class="mb-3 col-7 col-md-3">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" value="{{ @$diarista->complemento }}" class="form-control" id="complemento" name="complemento" maxlength="50">
                        </div>
                        <div class="mb-3 col-5 col-md-2">
                            <label for="cep" class="form-label">Cep</label>
                            <input type="text" value="{{ @$diarista->cep }}" class="form-control" id="cep" name="cep" maxlength="9" placeholder="12312-123">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12 col-md-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" value="{{ @$diarista->bairro }}" class="form-control" id="bairro" name="bairro" required maxlength="50">
                        </div>
                        <div class="mb-3 col-12 col-md-5">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" value="{{ @$diarista->cidade }}" class="form-control" id="cidade" name="cidade" required maxlength="50">
                        </div>
                        <div class="mb-3 col-4 col-md-2">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" value="{{ @$diarista->estado }}" class="form-control" id="estado" name="estado" required maxlength="2" placeholder="AA">
                        </div>
                        <div class="mb-3 col-8 col-md-2">
                            <label for="codigo_ibge" class="form-label">Código IBGE</label>
                            <input type="text" value="{{ @$diarista->codigo_ibge }}" class="form-control" id="codigo_ibge" name="codigo_ibge" required placeholder="123123">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="foto_usuario" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto_usuario" name="foto_usuario" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 mt-5 text-end">
                            <button type="submit" class="btn btn-primary w-25 py-4 px-5">Salvar</button>
                        </div>
                    </div>