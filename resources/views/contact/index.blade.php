<x-app-layout>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            @if($contacts->count() > 0)
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Mes contacts</h4>
                    <div class="nk-block-des text-soft">
                        <p>You avez {{ $contacts->total() }} contacts.</p>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('contact.create') }}" class="btn btn-white btn-dim btn-outline-primary">
                        <em class="icon ni ni-plus"></em><span>Ajouter un contact</span>
                    </a>
                </div>
            @else
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Aucun contact</h4>
                </div>
            @endif
        </div>
        @if(session('status') === 'contact-created')
            <x-input-success :message="__('Le contact a été créé avec succès.')"/>
        @endif
        @if(session('status') === 'contact-updated')
            <x-input-success :message="__('Le contact a été modifié avec succès.') "/>
        @endif
        @if(session('status') === 'contact-deleted')
            <x-input-success :message=" __('Le contact a été supprimé avec succès.')"/>
        @endif
    </div>

    @if($contacts->count() > 0)
        <div class="card card-bordered card-preview">
            <table class="table">
                <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id">#</th>
                    <th class="tb-tnx-info">Nom</th>
                    <th class="tb-tnx-info">Postnom</th>
                    <th class="tb-tnx-info">Numéro</th>
                    <th class="tb-tnx-info">Groupe(s)</th>
                    <th class="tb-tnx-info">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($contacts as $contact)
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">{{ $loop->index + 1 }}</td>
                        <td class="tb-tnx-info">{{ $contact->firstname }}</td>
                        <td class="tb-tnx-info">{{ $contact->name }}</td>
                        <td class="tb-tnx-info">{{ $contact->phone }}</td>
                        <td class="tb-tnx-info block">
                            @foreach($contact->groups as $group)
                                {{ $group->name }} <br/>
                            @endforeach
                        </td>
                        <td class="tb-tnx-info">
                            <a href="{{ route('contact.edit', ['id' => $contact->id]) }}"
                               class="btn btn-primary">Edition</a>
                            <form action="{{ route('contact.delete', ['id' => $contact->id ]) }}" method="post"
                                  style="display: inline-block" onclick="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Suppressiom</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <nav class="mt-3">
            {{ $contacts->links() }}
        </nav>
    @endif
</x-app-layout>