create database hris3;

use hris3;
select * from dbo.emp_basic
CREATE TABLE dbo.emp_basic  
(  
    id int identity(1,1) Primary key
    ,imagepath varchar(255) NULL
    ,agencyid varchar(255) NULL
    ,surname varchar(255) NULL
    ,suffix varchar(255) NULL
    ,firstname varchar(255) NULL
    ,middlename varchar(255) NULL
    ,dob varchar(255) NULL
    ,pob varchar(255) NULL
    ,gender varchar(255) NULL
    ,civil varchar(255) NULL
    ,citizenship varchar(255) NULL
    ,multi varchar(255) NULL
    ,height varchar(255) NULL
    ,weightt varchar(255) NULL
    ,bloodtype varchar(255) NULL
    ,username varchar(255) NULL
    ,pass varchar(255) NULL
    ,userlevel varchar(255) NULL
    ,addresss varchar(255) NULL
    ,identification varchar(255) NULL
    ,family varchar(255) NULL
    ,misc_info varchar(255) NULL
    ,hrinfo varchar(255) NULL
	,competency varchar(255) NULL
    
);

create table dbo.department (

	id int NOT NULL identity Primary key,
	name varchar(50)
)


use test0;
select * from dbo.department;
insert into dbo.department(name) values ('test');

go

insert into dbo.emp_basic (name) values ('test');
 
use hris3;

select * from empbasic;


Select * from dbo.munit;
--create mother unit and enter data
create table dbo.munit (

	id int NOT NULL identity Primary key,
	mother_unit varchar(50)
)

insert into dbo.munit (mother_unit) values ('ARD');
insert into dbo.munit (mother_unit) values ('LHSD');
insert into dbo.munit (mother_unit) values ('MSD');
insert into dbo.munit (mother_unit) values ('Prov. DOH Office');
insert into dbo.munit (mother_unit) values ('RD');
insert into dbo.munit (mother_unit) values ('RLED');


--create mother station and enter data
create table dbo.mstation (

	id int NOT NULL identity Primary key,
	mother_station varchar(100),
	mother_unit varchar(50)
)

select * from dbo.mstation;


insert into dbo.mstation (mother_station, mother_unit) values ('OFFICE OF THE DIRECTOR III', '1');
insert into dbo.mstation (mother_station, mother_unit) values ('OFFICE OF THE DIRECTOR IV', '5');
insert into dbo.mstation (mothe4r_station, mother_unit) values ('REGULATION, LICENSING AND ENFORCEMENT DIVISION
', '6');
insert into dbo.mstation (mother_station, mother_unit) values ('NORTH COTABATO', '4');
insert into dbo.mstation (mother_station, mother_unit) values ('SARANGANI / GENERAL SANTOS CITY', '4');
insert into dbo.mstation (mother_station, mother_unit) values ('SOUTH COTABATO', '4');
insert into dbo.mstation (mother_station, mother_unit) values ('SULTAN KUDARAT', '4');
insert into dbo.mstation (mother_station, mother_unit) values ('ENVIRONMENTAL & OCCUPATIONAL HEALTH CLUSTER', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('FAMILY HEALTH CLUSTER', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('HEALTH EMERGENCY MANAGEMENT SYSTEMS', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('HEALTH FACILITY DEVELOPMENT CLUSTER', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('HEALTH FACILITY ENHANCEMENT PROGRAM', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('HEALTH SYSTEMS DEVELOPMENT CLUSTERn', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('INFECTIOUS DISEASE CLUSTER', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('NON COMMUNICABLE DISEASE CLUSTER', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('OFFICE OF THE CHIEF LOCAL HEALTH SUPPORT DIVISION', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('REGIONAL EPIDEMIOLOGY & SURVEILLANCE UNIT', '2');
insert into dbo.mstation (mother_station, mother_unit) values ('ACCOUNTING SECTION', '3');
insert into dbo.mstation (mother_station, mother_unit) values ('BUDGET SECTION', '3');
insert into dbo.mstation (mother_station, mother_unit) values ('CASHIER SECTION', '3');
insert into dbo.mstation (mother_station, mother_unit) values ('COLD ROOM', '3');
insert into dbo.mstation (mother_station, mother_unit) values ('GENERAL SERVICES', '3');
insert into dbo.mstation (mother_station, mother_unit) values ('HEALTH EDUCATION & PROMOTION OFFICE', '3');
insert into dbo.mstation (mother_station, mother_unit) values ('HUMAN RESOURCE DEVELOPMENT UNIT', '3');
insert into dbo.mstation (mother_station, mother_unit) values ('INFORMATION & COMMUNICATION TECHNOLOGY UNIT', '3');



create table dbo.hrinfo (

	id int NOT NULL identity Primary key,
	name varchar(50)
)

--sample server queries
delete from dbo.empbasic where surname='test';
update dbo.empbasic set addresss='complete', identification='complete', family='complete', misc_info='complete', hrinfo='complete', competency='complete' where agencyid='336';
update dbo.empbasic set addresss='unset' where agencyid='336';


