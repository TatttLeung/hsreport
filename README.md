***！提交的时候，必须将错误日志清空，否则克隆下来会报错！！！！！***

***还有basepath里面的文件路径要根据自己的更改！！！！！***

 ***每次pull后，请及时更新数据库信息！***

## 合作文档

### 栏目
学年、学期、课程、专业、院系部门、教师、学生、课程学生、提交材料（明细）、课程作业

#### 人员信息管理：

##### 1 学生信息 ：学号，姓名，性别，年级，专业
##### 2 教师信息：编号，姓名，性别 ，院系，职称
##### 3 教师任课信息：学年，学期，教师姓名，所教课程
##### 4 课程学生信息：学年，学期，课程编码，课程名称，教师，学号，姓名，年级，成绩

#### 课程材料提交：

##### 1 课程信息设置：学年，学期，编号，教师姓名，课程名称，实验报告提交次数，作业次数，考试次数
##### 2 课程作业设置：学年，学期，作业id，作业序号，作业名称，开始提交，截止时间
##### 3 学生材料提交：学年，学期，学号、姓名、课程名称、作业id、作业序号，提交文件，分数
##### 4 教师提交确认（teaconfirm）：学年，学期，学号、姓名、课程名称、作业id、作业序号，确认分数按钮
##### 5 材料审核进度查询：学年，学期，学号、姓名、课程名称、作业序号，审核时间，审核状态，审核意见


### 数据库表

#### 学年（base_year）

f_id 自动递增的id不用管

F_CODE	序号

F_NAME	学年名称

F_value	作用于上面一样不管，给函数里面填的

#### 学期（base_term）

f_id 自动递增的id不用管

F_CODE 序号

F_NAME 学期名称

F_value 同上

#### 性别基础(base_sex)

sexname

sexid

#### 专业（major）
##### majorname
##### majorid

#### 院系（department）
##### d_name
##### d_id

#### 学生信息（stuinfo）
##### 	stuid
##### 	stuname
##### 	stusex
##### 	stugrade
#####   stumajor

####  教师信息(teainfo) 
##### 	teaname
##### 	teasex
#####   teadep
#####   tealevel

#### 课程信息（courseinfo）
##### 	courseyear
##### 	courseterm
##### 	courseid
##### 	coursename
##### 	courseteacher
##### 	coursetime
##### 	reportcnt
##### 	homeworkcnt
##### 	examcnt

#### 课程学生信息（coursestu）
##### 	courseyear
##### 	courseterm 
##### 	courseid
##### 	coursename
##### 	courseteacher
##### 	stuid
##### 	stugrade
##### 	stuscore

stuname

#### 课程作业（coursework）
##### 	workyear 学年
##### 	workterm 学期
##### 	workid 作业序号
##### 	workname 作业名字
#####  workstart 开始时间
#####  workend 结束时间

**workcourse 课程名字**

**workcourseid 课程编码**

**workteacher 任课老师**

**worktype 作业类型**

#### 作业提交（workcommit）
##### 	cyear  学年
##### 	cterm  学期
##### 	ccourseid  课程编码

**ccoursename 课程名称**

##### 	cworkid    作业序号
#####  cstuname   学生姓名
#####  cstuid     学生id
#####  cpath      作业路径
#####  cscore     作业分数
#####  cstatus    审核状态
#####  copinion   审核意见
#####  ccoursename   课程名称
##### ctime   审核时间

#### 作业序号（base_num）
##### number

#### 年级（base_grade）
##### grade

#### 专业（base_subject）
##### subject

# 现有问题

1、筛选框，选择一次后不能恢复全选状态（已解决）

已解决：判断条件错误，修改即可

2、无法上传文件，无法下载文件（已解决）

解决方法：按照图片方式去弄

3、设置次数后，下拉框不能显示对应次数（待解决）

解决方法：弄一个base_num，并且在findall里加判断条件

4、同一课程不同老师无法解决作业设置的同名问题（已解决）

解决方法：加按钮，传ID

5、课程学生信息无法一列一列列出成绩出来（待解决）

解决方法：教务员点开看详情，老师看自己的

6、教务员审核暂不明确其用处（不解决）

7、课程学生信息由学生提交材料导入，意味着，不交作业无法显示这学生属于该课程（待解决）

解决方法：

8、........

# 2021-11-08

## 1、课程学生信息

学年、学期、课程名称、任课老师、作业类型、放上面

学年、学期给默认值

列出每次作业分数（for循环）

不要审核

## 2、教师任课信息

加老师姓名 放上面

## 3、课程信息设置

