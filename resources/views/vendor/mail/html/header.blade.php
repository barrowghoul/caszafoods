@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="https://img1.wsimg.com/isteam/ip/ed85fc6d-698d-49ab-b1cb-0b98a2205145/LOGOTIPOS%20CASZA%20FOODS.jpg/:/cr=t:0%25,l:0%25,w:100%25,h:100%25/rs=w:100,cg:true" class="logo" alt="Laravel Logo">
@endif
</a>
</td>
</tr>
