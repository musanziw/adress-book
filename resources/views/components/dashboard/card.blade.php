@props(['message', 'description'])

<div class="card card-bordered">
    <div class="card-inner">
        <div class="team">
            <div class="user-card user-card-s2">
                <div class="user-avatar md bg-primary">
                    <span>{{ $message }}</span>
                </div>
                <div class="user-info">
                    <h6>{{ $description }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>