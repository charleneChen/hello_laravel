## 开发环境

1. Laravel 5.5 + Homestead
2. Redis
3. 需要 npm install

## 项目配置好后需要初始化数据

1. php artisan migrate --seed // 数据库迁移、插入 Faker 测试数据
2. php artisan seats:write 1  // 把场地座位信息写入 Redis，后面的参数代表场地 id，目前只使用测试数据 1

## 测试用户

1. 邮箱请查阅数据库，因为使用 Faker 插入的测试数据
2. 密码默认为 `secret` 或者 `password`

## 查看晚会的订票情况地址
`/parties/1/orders`

由于时间关系，这个对应的链接地址没有放到页面上

## 实现的功能

1. 注册、登录
2. 管理员角色 + 普通用户角色 + 简单的权限判断访问不同页面
3. 随机分配座位，完成订票
4. 查看用户的订票情况
5. gravatar 用户头像显示

## 待实现的功能

因为时间的关系，目前完成的只是一个粗略版本，下面列出还需要完善的一些功能：

1. 多个用户同时订票的时候，要锁票
2. 出错时候的一个错误页面展示，以及相应回滚机制
3. 已选座位、可选座位的效果展示


## 总结

1. 关于随机分配座位，利用了 Redis 的 srandmemebr 等特性。实现思路：

    首先，根据场地座位规则，得出每个座位的编号，存入 Mysql 和 Redis
    
    然后，根据请求分配座位数目，从 Redis 中 srandmemebr 出相应数目的座位
    
    如果确定随机分配的座位，提交了表单，就把分配出的座位从 Redis 中移除
    
    但是这有个问题，多个用户同时请求有可能会拿到同样的座位，所以需要完善添加锁票、回滚机制
    
2. 用户点击随机分配座位的时候，使用的是异步请求相应的 API 接口，使用了 `JWTAuth` 实现 API Auth ,
   这个 access token 需要加到请求的 header 中，在表单中添加了隐藏 input 放置这个 token
   
3. Laravel 这个框架整体上和 Ruby on Rails 框架类似，应用起来不是很难，难点主要是这里面的使用方式和 Rails 有区别。
    
    比如说，request 过滤，Rails 用的是 filter
   
4. Laravel Mix 这个很好用，前端编译等方面省了很多事 
        
