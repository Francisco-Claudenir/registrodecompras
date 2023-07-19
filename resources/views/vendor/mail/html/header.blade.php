<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://sistemas.ppg.uema.br/images/uema/icon_uema.png" class="logo" alt="Sistemas Ppg" height="full" width="full">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
