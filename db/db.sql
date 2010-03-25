
  CREATE TABLE "R3LACASGU"."WIKI" 
   (	"ID" NUMBER(8,0) NOT NULL ENABLE, 
	"TITLE" VARCHAR2(255 BYTE) NOT NULL ENABLE, 
	"OWNERLIST" VARCHAR2(4000 BYTE) NOT NULL ENABLE, 
	"LANGUAGENAME" VARCHAR2(255 BYTE) NOT NULL ENABLE, 
	 CONSTRAINT "WIKI_PK" PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "R3"  ENABLE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "R3" ;
 

  CREATE TABLE "R3LACASGU"."MEMBER" 
   (	"ID" NUMBER(8,0) NOT NULL ENABLE, 
	"EMAILADDRESS" VARCHAR2(255 BYTE) NOT NULL ENABLE, 
	"PASSWORDMD5" VARCHAR2(255 BYTE) NOT NULL ENABLE, 
	 CONSTRAINT "MEMBER_PK" PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "R3"  ENABLE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "R3" ;
 

  CREATE TABLE "R3LACASGU"."ARTICLE" 
   (	"ID" NUMBER(8,0) NOT NULL ENABLE, 
	"WIKIID" NUMBER(8,0) NOT NULL ENABLE, 
	"TITLE" VARCHAR2(255 BYTE), 
	"CONTENT" VARCHAR2(4000 BYTE), 
	 CONSTRAINT "ARTICLE_PK" PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "R3"  ENABLE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "R3" ;
 
