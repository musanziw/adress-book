<x-app-layout>

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Liste des groups disponibles</h4>

            </div>

            <div class="nk-block-head-content">
                <a href="{{ route('contact.create') }}" class="btn btn-white btn-dim btn-outline-primary">
                    <em class="icon ni ni-plus"></em><span>Add contact</span>
                </a>
            </div>
        </div>

        @if(session('status') === 'contact-created')
            <x-input-success :message="__('contact created successfully')"/>
        @endif
        @if(session('status') === 'group-created')
            <x-input-success :message="__('Group created successfully') "/>
        @endif
        @if(session('status') === 'group-deleted')
            <x-input-success :message=" __('Group deleted successfully')"/>
        @endif

    </div>

    <div class="card card-bordered card-preview">
        <table class="table">
            <thead>
            <tr class="tb-tnx-head">
                <th class="tb-tnx-id">#</th>
                <th class="tb-tnx-info">Firstname</th>
                <th class="tb-tnx-info">name</th>
                <th class="tb-tnx-info">Lastname</th>
                <th class="tb-tnx-info">Groups</th>
                <th class="tb-tnx-info">Actions</th>
            </tr>
            </thead>
            <tbody>


            @foreach($contacts as $contact)
                <tr class="tb-tnx-item">
                    <td class="tb-tnx-id">{{ $contact->id }}</td>
                    <td class="tb-tnx-info">{{ $contact->firstname }}</td>
                    <td class="tb-tnx-info">{{ $contact->name }}</td>
                    <td class="tb-tnx-info">{{ $contact->lastname }}</td>
                    <td class="tb-tnx-info">
                        @foreach($contact->groups as $group)
                           <span style="display: block">
                               {{ $group->name }}
                           </span>
                        @endforeach
                    </td>



                    <td class="tb-tnx-info">
                            <a href="" class="btn btn-primary">Edition</a>
                            <form action="" method="post" style="display: inline-block">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>

                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>

</x-app-layout>