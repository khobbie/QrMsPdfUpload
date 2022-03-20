@if ($hidden == 'block')
    <tr>
        <th>{{ $count }}</th>
        <td>{{ $fileName }}</td>
        <td>{{ $content }}</td>


        <td>
            @if ($status == 'Submitted')
                <span class="badge rounded-pill bg-dark">{{ $status }}</span>
            @endif
            @if ($status == 'OnProcessing')
                <span class="badge rounded-pill bg-warning">{{ $status }}</span>
            @endif
            @if ($status == 'Processed')
                <span class="badge rounded-pill bg-success">{{ $status }}</span>
            @endif
        </td>


        <td> {{ $created_at }} </td>
        <td class="text-center">
            <div class="dropdown " style="zoom: 0.8;">
                <a class="btn btn-sm btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <b> >>> </b>
                </a>

                <a href="{{ url('document-viewer', ['document_id' => $uuid]) }}" target="_blank">
                    <button class="btn btn-sm btn-primary">View</button>

                </a>



                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#"
                            wire:click="updateStatus('Submitted', '{{ $_id }}')">Submitted </a></li>
                    <li><a class="dropdown-item" href="#"
                            wire:click="updateStatus('OnProcessing', '{{ $_id }}')">onProcessing</a></li>
                    <li><a class="dropdown-item" href="#"
                            wire:click="updateStatus('Processed', '{{ $_id }}')">Processed</a></li>
                </ul>

                <button class="btn btn-sm btn-danger" wire:click="deleteQr('{{ $_id }}')">Remove</button>
            </div>


        </td>
    </tr>
@else
    <span></span>
@endif
