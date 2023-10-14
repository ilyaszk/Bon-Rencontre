<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('frontend/img/logo.png') }}" class="logo" alt="Bon Rencontre Logo"
                    height="100" width="120">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
