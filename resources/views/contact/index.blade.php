<x-app-layout>

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Liste des contacts</h4>

            </div>

            <div class="nk-block-head-content">
                <a href="{{ route('contact.create') }}" class="btn btn-white btn-dim btn-outline-primary">
                    <em class="icon ni ni-plus"></em><span>Add contact</span>
                </a>
            </div>
        </div>

        @if(session('status') === 'contact-created')
            <x-input-success :message="__('Contact created successfully')"/>
        @endif
        @if(session('status') === 'contact-updated')
            <x-input-success :message="__('Contact updated successfully') "/>
        @endif
        @if(session('status') === 'contact-deleted')
            <x-input-success :message=" __('Contact deleted successfully')"/>
        @endif

    </div>

    <div class="card card-bordered card-preview">
        <table class="table">
            <thead>
            <tr class="tb-tnx-head">
                <th class="tb-tnx-id">#</th>
                <th class="tb-tnx-info">Firstname</th>
                <th class="tb-tnx-info">Name</th>
                <th class="tb-tnx-info">Phone</th>
                <th class="tb-tnx-info">Groups</th>
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
                    <td class="tb-tnx-info">
                        @foreach($contact->groups as $group)
                            <span style="display: block">
                               {{ $group->name }}
                           </span>
                        @endforeach
                    </td>
                    <td class="tb-tnx-info">
                        <a href="{{ route('contact.edit', ['id' => $contact->id]) }}"
                           class="btn btn-primary">Edition</a>
                        <form action="{{ route('contact.delete', ['id' => $contact->id ]) }}" method="post"
                              style="display: inline-block" onclick="return confirm('Are sur ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>

</x-app-layout>