<x-app-layout>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            @if($messages->count() > 0)
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Mes messages</h3>
                    <div class="nk-block-des text-soft">
                        <p>You avez envoyés {{ $messages->total() }} messages.</p>
                    </div>
                </div>
            @else
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Aucun messages</h3>
                    <div class="nk-block-des text-soft">
                        <p>Vous n'avez envoyé aucun message.</p>
                    </div>
                </div>
            @endif
        </div>
        @if(session('success') === 'message-sent')
            <x-input-success :message="__('Message envoyé avec success.')"/>
        @endif
    </div>
    @if($messages->total() !== 0)
        <div class="card card-bordered card-preview">
            <table class="table">
                <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id">#</th>
                    <th class="tb-tnx-info">Objet</th>
                    <th class="tb-tnx-info">Destinataire(s)</th>
                    <th class="tb-tnx-info">Date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($messages as $message)
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">{{ $loop->index + 1 }}</td>
                        <td class="tb-tnx-info">{{ $message->title }}</td>
                        <td class="tb-tnx-info">
                            @if($message->groups)
                                @foreach($message->groups as $group)
                                    {{ $group->name }} <br/>
                                @endforeach
                            @endif
                            @if($message->contacts)
                                @foreach($message->contacts as $contact)
                                    {{ $contact->name }} <br/>
                                @endforeach
                            @endif
                        </td>
                        <td class="tb-tnx-info">{{ $message->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <nav class="mt-3">
            {{ $messages->links() }}
        </nav>
    @endif
</x-app-layout>