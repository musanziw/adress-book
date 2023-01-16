<x-app-layout>

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Dashboard</h3>
            </div>
        </div>
    </div>

    <div class="row g-gs mb-3">
        <div class="col-lg-12">
            <div class="row g-3">
                <div class="col-sm-4 col-xxl-12">
                    <x-dashboard.card :message="$messages->available_sms" :description="__('Messages disponibles')"/>
                </div>

                <div class="col-sm-4 col-xxl-12">
                    <x-dashboard.card :message="$messages->sent_sms" :description="__('Messages envoyés')"/>
                </div>

                <div class="col-sm-4 col-xxl-12">
                    <x-dashboard.card :message="$messages->available_emails" :description="__('Emails disponibles')"/>
                </div>

                <div class="col-sm-4 col-xxl-12">
                    <x-dashboard.card :message="$messages->sent_emails" :description="__('Emails envoyés')"/>
                </div>

                <div class="col-sm-4 col-xxl-12">
                    <x-dashboard.card :message="$contacts" :description="__('Total des contacts')"/>
                </div>

                <div class="col-sm-4 col-xxl-12">
                    <x-dashboard.card :message="$groups" :description="__('Total des groups')"/>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>