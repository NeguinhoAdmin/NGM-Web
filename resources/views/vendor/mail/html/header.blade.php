@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="{{ asset('/img/neguinho3.png') }}" class="logo" alt="Neguinho Motors Logo">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>