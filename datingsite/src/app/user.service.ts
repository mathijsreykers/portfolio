import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class UserService {
user = "";

postUrl="http://localhost/angularWWW/groepwerk/datingsite/src/apis/registerAPI.php";
loginUrl="http://localhost/angularWWW/groepwerk/datingsite/src/apis/loginAPI.php";
feedUrl="http://localhost/angularWWW/groepwerk/datingsite/src/apis/feedAPI.php";
matchUrl="http://localhost/angularWWW/groepwerk/datingsite/src/apis/matchAPI.php";
likeUrl="http://localhost/angularWWW/groepwerk/datingsite/src/apis/likeAPI.php";
saveUrl="http://localhost/angularWWW/groepwerk/datingsite/src/apis/save.php";
updateUrl="http://localhost/angularWWW/groepwerk/datingsite/src/apis/updateAPI.php";

constructor(private http:HttpClient) { }
  registerf(data:object):Observable<any>{
    return this.http.post(this.postUrl,data,{responseType: 'json'});
  }
  signinf(data:object):Observable<any>{ 
    return this.http.post(this.loginUrl,data,{responseType:'json'});
  }
  feedf(data:object):Observable<any>{ 
      return this.http.post(this.feedUrl,data,{responseType:'json'});
  }
  matchesf(data:object):Observable<any>{ 
    return this.http.post(this.matchUrl,data,{responseType:'json'});
  }
  likef(data:object):Observable<any>{ 
    return this.http.post(this.likeUrl,data,{responseType:'json'});
  }
  savef(data:object):Observable<any>{
    return this.http.post(this.saveUrl,data,{responseType:'json'})
  }
  updatef(data:object):Observable<any>{
    return this.http.post(this.updateUrl,data,{responseType: 'json'});
  }
}