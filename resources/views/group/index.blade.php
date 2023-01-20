<x-app-layout>

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            @if($groups->count() > 0)
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Mes groupes</h4>
                    <div class="nk-block-des text-soft">
                        <p>You avez {{ $groups->total() }} groupes.</p>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('group.create') }}" class="btn btn-white btn-dim btn-outline-primary">
                        <em class="icon ni ni-plus"></em><span>Ajouer un groupe</span>
                    </a>
                </div>
            @else
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Aucun groupe</h4>
                </div>
            @endif
        </div>
        @if(session('status') === 'group-upated')
            <x-input-success :message="__('Groupe modifié avec succès.')"/>
        @endif
        @if(session('status') === 'group-created')
            <x-input-success :message="__('Groupe créé avec succès.') "/>
        @endif
        @if(session('status') === 'group-deleted')
            <x-input-success :message=" __('Groupe supprimé avec succès.')"/>
        @endif
    </div>

    @if($groups->count() > 0)
        <div class="card card-bordered card-preview">
            <table class="table">
                <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id"><span class="">#</span></th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">Nom</span>
                    </th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">Actions</span>
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($groups as $group)
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                            <a href="#">{{ $group->id }}</a>
                        </td>
                        <td class="tb-tnx-info">
                            <div class="tb-tnx-desc">
                                <span class="title">{{ $group->name }}</span>
                            </div>
                        </td>

                        <td class="tb-tnx-info">
                            <div class="tb-tnx-desc">
                                <a href="{{ route('group.edit', ['id' => $group->id]) }}"
                                   class="btn btn-primary">Edition</a>
                                <form action="{{ route('group.delete', ['id' => $group->id]) }}" method="post"
                                      style="display: inline-block" onclick="return confirm('Are sur ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <nav class="mt-3">
            {{ $groups->links() }}
        </nav>
    @endif
</x-app-layout>