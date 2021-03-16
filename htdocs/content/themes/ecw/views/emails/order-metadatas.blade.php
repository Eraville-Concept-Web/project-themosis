@if(isset($allmetas) && is_array($allmetas))
    @foreach ($allmetas as $meta)
        <tr>
            <th style="text-align:left; border: 1px solid #eee;" scope="row">
                {{ esc_html($meta->get_data()['key']) }}
            </th>
            <td style="text-align:left; border: 1px solid #eee;">
                {{ esc_html($meta->get_data()['value']) }}
            </td>
        </tr>
    @endforeach
@endif
