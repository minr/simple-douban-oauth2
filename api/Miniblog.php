<?php
/**
 * @file Miniblog.php
 * @brief 豆瓣广播API
 * @author JonChou <ilorn.mc@gmail.com>
 * @version 0.1
 * @date 2012-11-27
 */

class Miniblog extends Base {

    /**
     * @brief 构造函数，初始设置clientId和accessToken
     *
     * @param string $clientId
     * @param string $accessToken
     *
     * @return void
     */
    public function __construct($clientId, $accessToken = null)
    {
        parent::__construct($clientId, $accessToken);
    }

    /**
     * @brief 发送一条豆瓣广播
     *
     * @return object
     */
    public function addMiniblog()
    {
        $this->uri = '/shuo/v2/statuses/';
        $this->header = $this->authorizeHeader;
        $this->type = 'POST';
        return $this;   
    }
    
    /**
     * @brief 读取一条广播
     *
     * @param string $id
     *
     * @return object
     */
    public function getMiniblog($id)
    {
        $this->uri = "/shuo/v2/statuses/$id";
        return $this;   
    }    

    /**
     * @brief 删除一条广播
     *
     * @param string $id
     *
     * @return object
     */
    public function deleteMiniblog($id)
    {
        $this->uri = "/shuo/v2/statuses/$id";
        $this->header = $this->authorizeHeader;
        $this->type = 'DELETE';
        return $this;   
    }
    
    /**
     * @brief 获取一条广播的回复列表（未测试）
     *
     * @param string $id
     * @param int $start
     * @param int $count
     *
     * @return object
     */
    public function getCommentsList($id, $start = 0, $count = 20)
    {
        $this->uri = "/shuo/v2/statuses/$id/comments?start=$start&count=$count";
        return $this;
    }
    
    /**
     * @brief 回复某条广播（未测试）
     *
     * @param string $id
     *
     * @return object
     */
    public function addComment($id)
    {
        $this->uri = "/shuo/v2/statuses/$id/comments";
        $this->header = $this->authorizeHeader;
        $this->type = 'POST';
        return $this;   
    }
    
    /**
     * @brief 获取广播的单条回复（未测试）
     *
     * @param string $id
     *
     * @return object
     */
    public function getComment($id)
    {
        $this->uri ="/shuo/v2/statuses/comment/$id";
        return $this;
    }
    
    /**
     * @brief 删除广播的单条回复
     *
     * @param string $id
     *
     * @return object
     */
    public function deleleComment($id)
    {
        $this->uri = "/shuo/v2/statuses/comment/$id";
        $this->header = $this->authorizeHeader;
        $this->type = 'DELETE';
        return $this;   
    }
    
    /**
     * @brief 获取一条广播的转发相关信息（未测试）
     *
     * @param string $id
     *
     * @return object
     */
    public function getReshare($id)
    {
        $this->uri = "/shuo/v2/statuses/$id/reshare";
        return $this;
    }
    
    /**
     * @brief 转发一条广播
     *
     * @param string $id
     *
     * @return object
     */
    public function reshare($id)
    {
        $this->uri = "/shuo/v2/statuses/$id/reshare";
        $this->header = $this->authorizeHeader;
        $this->type = 'POST';
        return $this;   
    }


    /**
     * @brief 获取一条广播的赞相关信息（未测试）
     *
     * @param string $id
     *
     * @return object
     */
    public function getLikers($id)
    {
        $this->uri = "/shuo/v2/statuses/$id/like";
        return $this;
    }


    /**
     * @brief 赞一条广播
     *
     * @param string $id
     *
     * @return object
     */
    public function like($id)
    {
        $this->uri = "/shuo/v2/statuses/$id/like";
        $this->header = $this->authorizeHeader;
        $this->type = 'POST';
        return $this;    
    }

    /**
     * @brief 取消赞（未测试）
     *
     * @param string $id
     *
     * @return object
     */
    public function dislike($id)
    {
        $this->uri = "/shuo/v2/statuses/$id/like";
        $this->header = $this->authorizeHeader;
        $this->type = 'DELETE';
        return $this;    
    }

    public function following($id)
    {
        $this->uri = "/shuo/v2/users/$id/following";
        return $this;
    }

    public function followers($id)
    {
        $this->uri = "/shuo/v2/users/$id/followers";
        return $this;
    }

    public function followInCommon($id)
    {
        $this->uri = "/shuo/v2/users/$id/follow_in_common";
        return $this;
    }

    public function suggestions($id)
    {
        $this->uri = "/shuo/v2/users/$id/following_followers_of";
        return $this;
    }

    public function block($id)
    {
        $this->uri = "/shuo/v2/users/$id/block";
        $this->header = $this->authorizeHeader;
        $this->type = "POST";
        return $this;

    }

    public function unfollow()
    {
        $this->uri = "/shuo/v2/friendships/destroy";
        $this->header = $this->authorizeHeader;
        $this->type = "POST";
        return $this;

    }

    public function show($source, $sourceId, $targetId)
    {
        $this->uri = "/shuo/v2/friendships/show?soucre=$source&soucre_id=$sourceId&target_id=$targetId";
        return $this;
    }

    /**
     * @brief 获取当前登录用户及其所关注用户的最新广播（友邻广播）
     *
     * @param string $sinceId
     * @param string $untilId
     * @param string $count
     * @param string $start
     *
     * @return object
     */
    public function homeTimeline($sinceId = null, $untilId = null, $count = null, $start = null )
    {
        $this->uri = "/shuo/v2/statuses/home_timeline?since_id=$sinceId&until_id=$untilId
            &count=$count&start=$start";
        $this->header = $this->authorizeHeader;
        return $this;

    }
    
    /**
     * @brief 获取用户发布的广播列表
     *
     * @param string $user
     * @param string $sinceId
     * @param string $untilId
     *
     * @return object
     */
    public function userTimeline($user, $sinceId = null, $untilId = null)
    {
        $this->uri = "/shuo/v2/statuses/user_timeline/$user?since_id=$sinceId&until_id=$untilId";
        return $this;
    }
    
}
