<?php //d7e569a51ab56d417441aa858fcef3ea
/** @noinspection all */

namespace Database\Factories {

    use Illuminate\Database\Eloquent\Factories\Factory;
    
    /**
     * @method $this hasContacts(int $count = 1, $attributes = [])
     */
    class GroupFactory extends Factory {}
    
    /**
     * @method $this hasNotifications(int $count = 1, $attributes = [])
     * @method $this hasReadNotifications(int $count = 1, $attributes = [])
     * @method $this hasTokens(int $count = 1, $attributes = [])
     * @method $this hasUnreadNotifications(int $count = 1, $attributes = [])
     */
    class UserFactory extends Factory {}
}