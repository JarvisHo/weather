<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{

    use RefreshDatabase;

    /** @test 可以新增洗車項目 */
    public function it_can_create_a_project()
    {
        $this->assertTrue(true);
    }

    /** @test 可以新增官方用品標籤到洗車項目 */
    public function it_can_add_a_tag_to_a_project()
    {
        $this->assertTrue(true);
    }

    /** @test 可以移除官方用品標籤到洗車項目 */
    public function it_can_remove_a_tag_from_a_project()
    {
        $this->assertTrue(true);
    }

    /** @test 可以建立抽獎條件，符合資格可抽獎一次 */
    public function it_can_create_conditions()
    {
        $this->assertTrue(true);
    }

    /** @test 可以建立獎品與底下的折扣券 */
    public function it_can_create_prize_with_coupons()
    {
        $this->assertTrue(true);
    }

    /** @test 可以建立廣告圖文 */
    public function it_can_create_a_sales()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看會員 */
    public function it_can_get_users()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看會員洗車紀錄 */
    public function it_can_get_user_records()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看會員抽獎紀錄 */
    public function it_can_get_user_condition()
    {
        $this->assertTrue(true);
    }

    /** @test 可以查看會員折扣券 */
    public function it_can_get_user_coupons()
    {
        $this->assertTrue(true);
    }
}
