package com.blogproject.security;

import java.security.Key;

import javax.annotation.PostConstruct;

import org.springframework.security.core.Authentication;
import org.springframework.security.core.userdetails.User;
import org.springframework.stereotype.Service;

import io.jsonwebtoken.Jwts;
import io.jsonwebtoken.SignatureAlgorithm;
import io.jsonwebtoken.security.Keys;

@Service
public class JWTProvider {
	
	private Key key;
	
	@PostConstruct
	public void init() {
		 key = Keys.secretKeyFor(SignatureAlgorithm.HS512);
	}
	
	public String getToken(Authentication auth) {
		
		User user = (User) auth.getPrincipal();
		return Jwts.builder().setSubject(user.getPassword()).signWith(key).compact();
	}

}
