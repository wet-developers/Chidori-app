package com.blogproject.config;

import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;

@Configuration
@EnableWebSecurity
public class SecurityConfig extends WebSecurityConfigurerAdapter {

	@Override
	public void configure(HttpSecurity security) throws Exception {
//		security.csrf().disable().authorizeRequests()
//		.antMatchers("/api/auth**")
//		.permitAll()
//		.anyRequest()
//		.authenticated();
		security.csrf().disable();
	}
}
