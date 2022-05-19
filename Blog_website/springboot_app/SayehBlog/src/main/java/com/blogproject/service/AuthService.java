package com.blogproject.service;

import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import com.blogproject.controller.BlogController;
import com.blogproject.dto.LoginRequest;
import com.blogproject.dto.RegisterRequest;
import com.blogproject.model.User;
import com.blogproject.repository.UserRepository;
import com.blogproject.security.JWTProvider;


@Service
public class AuthService {
	
	private org.slf4j.Logger LOGGER = LoggerFactory.getLogger(BlogController.class);
	
	@Autowired
	private UserRepository userRepository;
	
	@Autowired
	private PasswordEncoder passwordEncoder;
	
	@Autowired
	private AuthenticationManager authManager;
	
	@Autowired
	private JWTProvider jwtProvider;

	public void signUp(RegisterRequest request) {
		User user = new User();
		
		user.setUserName(request.getUsername());
		user.setPassword(encodePassword(request.getPassword()));
		user.setEmail(request.getEmail());
		
		userRepository.save(user);

	}
	
	private String encodePassword(String password) {
		return passwordEncoder.encode(password);
	}

	public String login(LoginRequest login) {
		Authentication authenticate = authManager.authenticate(new UsernamePasswordAuthenticationToken(login.getUsername(), 
				login.getPassword()));
		
		LOGGER.info("Authenticated User Details with credentials: {}, details: {}, name: {}, authorities: {}, principal: {}",
				String.valueOf(authenticate.getCredentials()), String.valueOf(authenticate.getDetails()), authenticate.getName(), authenticate.getAuthorities(), authenticate.getPrincipal());
		jwtProvider.getToken(authenticate);
		SecurityContextHolder.getContext().setAuthentication(authenticate);
		return jwtProvider.getToken(authenticate);
	}

}
