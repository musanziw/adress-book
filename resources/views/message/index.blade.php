<x-app-layout>

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Liste des messages</h4>

            </div>

            <div class="nk-block-head-content">
                <a href="{{ route('contact.create') }}" class="btn btn-white btn-dim btn-outline-primary">
                    <em class="icon ni ni-plus"></em><span>Add contact</span>
                </a>
            </div>
        </div>
        @if(session('success') === 'message-sent')
            <x-input-success :message="__('Message sent successfully')"/>
        @endif
    </div>

    <div class="card card-bordered card-preview">
        <table class="table">
            <thead>
            <tr class="tb-tnx-head">
                <th class="tb-tnx-id">#</th>
                <th class="tb-tnx-info">Tite</th>
                <th class="tb-tnx-info">Content</th>
                <th class="tb-tnx-info">Type.s</th>
                <th class="tb-tnx-info">To</th>
            </tr>
            </thead>
            <tbody>

            @foreach($messages as $message)
                <tr class="tb-tnx-item">
                    <td class="tb-tnx-id">{{ $loop->index + 1 }}</td>
                    <td class="tb-tnx-info">{{ $message->title }}</td>
                    <td class="tb-tnx-info">{{ $message->content }}</td>
                    <td class="tb-tnx-info">
                        @foreach($message->types as $type)
                            <span style="display: block">
                               {{ $type->name }}
                           </span>
                        @endforeach
                    </td>
                    <td class="tb-tnx-info">
                        @foreach($message->groups as $group)
                            <span style="display: block">
                               {{ $group->name }}
                           </span>
                        @endforeach
                        @foreach($message->contacts as $contact)
                            <span style="display: block">
                               {{ $contact->name }}
                           </span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <nav class="mt-3">
        {{ $messages->links() }}
    </nav>

</x-app-layout>