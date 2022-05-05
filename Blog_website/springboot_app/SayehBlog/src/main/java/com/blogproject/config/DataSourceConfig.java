package com.blogproject.config;

import javax.sql.DataSource;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.boot.jdbc.DataSourceBuilder;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

@Configuration
public class DataSourceConfig {
	
	@Value("${spring.datasource.url}")
	private String dbURL;
	
	@Value("${spring.datasource.username}")
	private String dbUsername;
	
	@Value("${spring.datasource.password}")
	private String dbPassword;
	
	@Value("${spring.datasource.driver-class-name}")
	private String dbDriverClass;
	
	@Bean
	public DataSource datasource() {
		return DataSourceBuilder.create().driverClassName(dbDriverClass)
				.url(dbURL).username(dbUsername).password(dbPassword).build();
	}

}
