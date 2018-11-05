<h3>Olá, {{ $receiver }}! Você foi associado em um impedimento.</h3>
<p>Por: {{ $sender }}</p>
<p>Objetivo: {{ $objective }}</p>
<p>Resultado chave: {{ $key_result }}</p>
<p>Situação: {{ $status }}</p>
<p>Descrição: {{ $description }}</p>
@if($archive)
<p><a href="{{ url('uploads/' . $archive) }}" style="padding: 5px; background: #ef6c01; color: #fff; border-radius: 5px;">Arquivo</a></p>
@endif
<p><a href="{{ $link }}" style="padding: 5px; background: #ef6c01; color: #fff; border-radius: 5px;">Acessar impedimento</a></p>
<p>{{ __('mails.regards') }}, Mangrowe.</p>