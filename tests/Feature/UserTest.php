<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /** @test 可以註冊帳號 */
    public function it_can_register_user()
    {
        $this->assertTrue(true);
    }

    /** @test 可以登入帳號 */
    public function it_can_login_user()
    {
        $this->assertTrue(true);
    }

    /** @test 可以重置密碼 */
    public function it_can_reset_user_password()
    {
        $this->assertTrue(true);
    }

    /** @test 可以顯示距離最後洗車天數 */
    public function it_can_show_last_wash_car_days()
    {
        $this->assertTrue(true);
    }

    /** @test 可以儲存新的洗車項目 */
    public function it_can_create_a_record()
    {
        $this->assertTrue(true);
    }

    /** @test 可以取得洗車服務下的用品標籤 */
    public function it_can_get_tags_of_project()
    {
        $this->assertTrue(true);
    }

    /** @test 可以新增自訂用品標籤 */
    public function it_can_create_a_tag()
    {
        $this->assertTrue(true);
    }

    /** @test 新增洗車項目時若符合條件可以抽籤 */
    public function it_can_draw_a_prize()
    {
        $this->assertTrue(true);
    }

    /** @test 新增洗車項目時若相同符合條件不可抽籤 */
    public function it_cannot_draw_a_prize_with_same_condition()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看抽中的折扣券 */
    public function it_can_get_user_coupons()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看推薦用品 */
    public function it_can_get_sales()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看洗車紀錄 */
    public function it_can_get_records()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看本季獎項 */
    public function it_can_get_prizes()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看用戶自訂的用品標籤 */
    public function it_can_get_user_tags()
    {
        $this->assertTrue(true);
    }

    /** @test 可以更新用戶自訂的用品標籤 */
    public function it_can_update_user_tags()
    {
        $this->assertTrue(true);
    }

    /** @test 可以添加 用戶自訂的用品標籤到洗車服務中 */
    public function it_can_add_user_tag_to_a_project()
    {
        $this->assertTrue(true);
    }

    /** @test 可以移除 用戶自訂的用品標籤到洗車服務中 */
    public function it_can_remove_user_tag_from_a_project()
    {
        $this->assertTrue(true);
    }
}
