<x-app-layout>


    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Liste des groups disponibles</h4>
        </div>
    </div>

    <div class="card card-bordered card-preview">
        <table class="table">
            <thead>
            <tr class="tb-tnx-head">
                <th class="tb-tnx-id"><span class="">#</span></th>
                <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            <span>Nom</span>
                        </span>
                </th>

                <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            Actions
                        </span>
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
                            <a href="" class="btn btn-primary">Edition</a>
                            <form action="" method="post" style="display: inline-block">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>

</x-app-layout>