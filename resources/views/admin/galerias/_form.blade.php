@if(isset($registro->imagem))

	<input type="hidden" name="imovel_id" value="{{$imovel->id}}">

	<div class="input-field">
		<input type="text" name="titulo" class="validate" value="{{isset($registro->titulo)? $registro->titulo : '' }}">
		<label>Título da imagem</label>
	</div>

	<div class="input-field">
		<input type="text" name="descricao" class="validate" value="{{isset($registro->descricao)? $registro->descricao : '' }}">
		<label>Descrição da imagem</label>
	</div>

	<div class="row">
		<div class="file field input field col m6 s12">
			<div class="btn"> 
				<span>Imagem</span>
				<input type="file" name="imagem">	
			</div>
			
			<div class="file-path-wrapper">
				<input type="text" class="file-path validate">
			</div>
		</div>

		<div class="col m6 s12">
			<img width="120" src="{{asset($registro->imagem)}}">
		</div>
	</div>

	<div class="input-field col s12">
		<input type="text" name="ordem" class="validate" value="{{isset($registro->ordem)? $registro->ordem : '' }}">
		<label>Ordem da imagem</label>
	</div>
@else
	<div class="row">
		<div class="file field input field col m12 s12">
			<div class="btn"> 
				<span>Upload de Imagem</span>
				<input type="file" multiple name="imagens[]">	
			</div>
			<br><br>
			<div class="file-path-wrapper">
				<input type="text" class="file-path validate">
			</div>
		</div>
	</div>
@endif