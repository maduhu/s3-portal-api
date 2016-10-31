# User API Reference Guide

1. [Create a Account](#CreateAccount)
2. [Auth Login](#AuthLogin)
3. [Check Email](#CheckEmail)
4. [Logout](#Logout)
5. [Create Bucket](#CreateBucket)
6. [List Buckets](#ListBuckets)
7. [List Files](#ListFiles)
8. [Upload File](#UploadFile)
9. [Download File](#DownloadFile)
10. [Create Folder](#CreateFolder)
11. [Delete Bucket](#DeleteBucket)
12. [Delete File](#DeleteFile)
13. [Delete Folder](#DeleteFolder)
14. [Rename File](#RenameFile)

## 1.<a name="CreateAccount">Create a Account</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">POST</td>
        <td style="width:400px">/api/v1/auth/register</td>
    </tr>
</table>

### Input Parameter

<table>
    <tr>
        <td style="width:50px">Type</td>
        <td style="width:150px">Name</td>
        <td style="width:50px">Require</td>
        <td style="width:100px">Remark</td>
    </tr>
    <tr>
        <td style="width:50px">Email</td>
        <td style="width:150px">email</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">password</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">password_confirmation</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "id": *id*,
  "uid": *uid*,
  "email": *email*,
  "name": *name*,
  "created_at": *createTime*,
  "updated_at": *updateTime*
}
```

#### Error
```
status code:422
{
  "message": "validator_error",
  "errors": {
    "email": [
      "The email has already been taken."
    ]
  }
}
```

## 2.<a name="AuthLogin">Auth Login</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">POST</td>
        <td style="width:400px">/api/v1/auth/login</td>
    </tr>
</table>

### Input Parameter

<table>
    <tr>
        <td style="width:50px">Type</td>
        <td style="width:150px">Name</td>
        <td style="width:50px">Require</td>
        <td style="width:100px">Remark</td>
    </tr>
    <tr>
        <td style="width:50px">Email</td>
        <td style="width:150px">eamil</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">password</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "id": *id*,
  "uid": *uid*,
  "email": *email*,
  "name": *name*,
  "created_at": *createTime*,
  "updated_at": *updateTime*,
  "token": *token*
}
```

#### Error
```
status code:403
{
  "message": "Connection to Ceph failed"
}
```

```
status code:401
{
  "message": "verify_error"
}
```

## 3.<a name="CheckEmail">CheckEmail</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">GET</td>
        <td style="width:400px">/api/v1/auth/checkEmail/{email}</td>
    </tr>
</table>

### Input Parameter

<table>
    <tr>
        <td style="width:50px">Type</td>
        <td style="width:150px">Name</td>
        <td style="width:50px">Require</td>
        <td style="width:100px">Remark</td>
    </tr>
    <tr>
        <td style="width:50px">Email</td>
        <td style="width:150px">eamil</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
 	"message": "You can use the email"
}
```

#### Error
```
status code:403
{
  "message": "has_user"
}
```

## 4.<a name="Logout">Logout</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">POST</td>
        <td style="width:400px">/api/v1/logout</td>
    </tr>
</table>


### JSON Response
#### Success
```
status code:200
{
  "message": "Invalidate Token Success"
}
```

#### Error
```
status code:401
{
  "message": "Invalidate Token Error"
}
```

## 5.<a name="CreateBucket">Create Bucket</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">POST</td>
        <td style="width:400px">/api/v1/bucket/create</td>
    </tr>
</table>

### Input Parameter

<table>
    <tr>
        <td style="width:50px">Type</td>
        <td style="width:150px">Name</td>
        <td style="width:50px">Require</td>
        <td style="width:100px">Remark</td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">bucket</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "Buckets": [
    {
      "Name": "BucketName",
      "CreationDate": "2016-04-08T14:46:28.000Z"
    }
  ]
}
```

#### Error
```
status code:403
{
  "message": "Has Bucket"
}
- or -
status code:403
{
  "message": "Create Bucket Error"
}
- or -
status code:403
{
  "message": "Invalid Name"
}
```

## 6.<a name="ListBuckets">List Buckets</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">POST</td>
        <td style="width:400px">/api/v1/bucket/list</td>
    </tr>
</table>


### JSON Response
#### Success
```
status code:200
{
  "Buckets": [
    {
      "Name": "BucketName",
      "CreationDate": "2016-04-08T14:46:28.000Z"
    }
  ]
}
```

## 7.<a name="ListFiles">List Files</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">GET</td>
        <td style="width:400px">/api/v1/file/list/{bucket}?prefix={prefix}</td>
    </tr>
</table>


### JSON Response
#### Success
```
status code:200
{
  "files": [
    {
      "Key": "test/test.jpg",
      "LastModified": "2016-05-05T11:37:29.000Z",
      "ETag": "*etag*",
      "Size": "323844",
      "StorageClass": "STANDARD",
      "Owner": {
        "ID": "*account*",
        "DisplayName": "*displayname*"
      }
    }
  ]
}
```

#### Error
```
status code:403
{
  "message": "Bucket Error"
}
```

## 8.<a name="UploadFile">Upload File</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">POST</td>
        <td style="width:400px">/api/v1/file/create</td>
    </tr>
</table>

### Input Parameter

<table>
    <tr>
        <td style="width:50px">Type</td>
        <td style="width:150px">Name</td>
        <td style="width:50px">Require</td>
        <td style="width:100px">Remark</td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">bucket</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
    <tr>
        <td style="width:50px">File</td>
        <td style="width:150px">file</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">prefix</td>
        <td style="width:50px"></td>
        <td style="width:100px"></td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "message": "Upload File Success"
}
```
#### Error
```
status code:403
{
  "message": "Bucket not Exist"
}
- or -
status code:403
{
  "message": "Upload File Error"
}
```

## 9.<a name="DownloadFile">Download File</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">GET</td>
        <td style="width:400px">/api/v1/file/get/{bucket}/{key}</td>
    </tr>
</table>

### JSON Response
#### Success
```
    Download file
```

#### Error
```
status code:403
{
  "message": "Has Error"
}
```

## 10.<a name="CreateFolder">Create Folder</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">POST</td>
        <td style="width:400px">/api/v1/folder/create</td>
    </tr>
</table>

### Input Parameter

<table>
    <tr>
        <td style="width:50px">Type</td>
        <td style="width:150px">Name</td>
        <td style="width:50px">Require</td>
        <td style="width:100px">Remark</td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">bucket</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">prefix</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "message": "Create Folder Success"
}
```

#### Error
```
status code:403
{
  "message": "Bucket not Exist"
}
- or -
status code:403
{
  "message": "Create Folder Error"
}
- or -
status code:403
{
  "message": "Folder exist"
}
```

## 11.<a name="DeleteBucket">Delete Buckets</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">DELETE</td>
        <td style="width:400px">/api/v1/bucket/delete/{bucket}</td>
    </tr>
</table>

### Input Parameter

<table>
    <tr>
        <td style="width:50px">Type</td>
        <td style="width:150px">Name</td>
        <td style="width:50px">Require</td>
        <td style="width:100px">Remark</td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">bucket</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "message": "Delete Bucket Success"
}
```

#### Error
```
status code:403
{
  "message": "Delete Bucket Error"
}
- or -
status code:403
{
  "message": "Bucket Non-exist"
}
```

## 12.<a name="DeleteFile">Delete File</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">DELETE</td>
        <td style="width:400px">/api/v1/file/delete/{bucket}/{key}</td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "message": "Delete File Success"
}
```

#### Error
```
status code:403
{
  "message": "Delete File Error"
}
- or -
status code:403
{
  "message": "File Non-exist"
}
```

## 13.<a name="DeleteFolder">Delete Folder</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">DELETE</td>
        <td style="width:400px">/api/v1/folder/delete/{bucket}/{key}</td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "message": "Delete File Success"
}
```

#### Error
```
status code:403
{
  "message": "Delete Folder Error"
}
- or -
status code:403
{
  "message": "Folder Non-exist"
}
```

## 14.<a name="RenameFile">Rename File</a>

<table>
    <tr>
        <td style="width:50px">Method</td>
        <td style="width:400px">URI</td>
    </tr>
    <tr>
        <td style="width:50px">POST</td>
        <td style="width:400px">/api/v1/file/rename</td>
    </tr>
</table>

### Input Parameter

<table>
    <tr>
        <td style="width:50px">Type</td>
        <td style="width:150px">Name</td>
        <td style="width:50px">Require</td>
        <td style="width:100px">Remark</td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">bucket</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">old</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
    <tr>
        <td style="width:50px">String</td>
        <td style="width:150px">new</td>
        <td style="width:50px">✔︎</td>
        <td style="width:100px"></td>
    </tr>
</table>

### JSON Response
#### Success
```
status code:200
{
  "message": "Rename File Success"
}
```

#### Error
```
status code:403
{
  "message": "Rename File Error"
}
- or -
status code:403
{
  "message": "File Non-exist"
}
- or -
status code:403
{
  "message": "File name has exist"
}
```